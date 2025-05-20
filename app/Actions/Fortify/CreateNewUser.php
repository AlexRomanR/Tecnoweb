<?php

namespace App\Actions\Fortify;

use App\Models\Postulante;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        try {
            $validator = Validator::make($input, [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'ci' => ['required', 'integer', 'unique:users'],
                'telefono' => ['required', 'integer', 'unique:users'],
                'direccion' => ['string', 'max:255'],
                'password' => $this->passwordRules(),
                'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
            ], [
                'name.required' => 'Debes ingresar tu nombre.',
                'email.required' => 'Debes ingresar tu correo electrónico.',
                'ci.required' => 'Debes ingresar tu C.I.',
                'telefono.required' => 'Debes ingresar tu teléfono.',
                'ci.unique' => 'La Cédula de Identidad ya está registrada.',
                'telefono.unique' => 'El número de teléfono ya está en uso.',
                'email.unique' => 'El correo electrónico ya está en uso.',
                'password_confirmation.required' => 'Debes confirmar la contraseña.',
                'password_confirmation.same' => 'Las contraseñas no coinciden.',

            ]);
            $validator->validate();
            $user = User::create([
                'name' => $input['name'],
                'email' => $input['email'],
                'ci' => $input['ci'],
                'telefono' => $input['telefono'],
                'direccion' => $input['direccion'],
                'password' => Hash::make($input['password']),
                'Postulante' => true,
                'Empleado' => false,
            ]);

            $postulantes = new Postulante();
            $user->postulante()->save($postulantes);
            $user->assignRole('Postulante');

            return $user;
        } catch (ValidationException $e) {
            throw $e;
        }
    }
}
