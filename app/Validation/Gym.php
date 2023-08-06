<?php

namespace App\Validation;

class Gym
{

    /**
     * Rules for gyms
     *
     * @param integer|null $id
     * @return array
     */
    public static function rules(?int $id = null): array
    {

        return [

            'id' => [
                'label'  => 'Id',
                'rules'  => 'permit_empty|is_natural_no_zero',
            ],

            'name' => [
                'label'  => 'Nome',
                'rules'  => "required|max_length[69]|is_unique[gyms.name,id,{$id}]",
                'errors' => [
                    'required'     => 'Nome é obrigatório',
                    'max_length'   => 'Nome precisa ter no máximo 70 caractéres',
                    'is_unique'    => 'Essa academia já existe',
                ],
            ],


            'email' => [
                'label'  => 'E-mail',
                'rules'  => "required|max_length[100]|is_unique[gyms.email,id,{$id}]",
                'errors' => [
                    'required'     => 'E-mail é obrigatório',
                    'max_length'   => 'E-mail precisa ter no máximo 14 caractéres',
                    'is_unique'    => 'E-mail já existe',
                ],
            ],

            'phone' => [
                'label'  => 'Telefone',
                'rules'  => "required|max_length[69]|is_unique[gyms.phone,id,{$id}]",
                'errors' => [
                    'required'     => 'Telefone é brigatório',
                    'max_length'   => 'Telefone precisa ter no máximo 14 caractéres',
                    'is_unique'    => 'Esse telefone já existe',
                ],
            ],

            'manager' => [
                'label'  => 'Gerente',
                'rules'  => "required|max_length[69]",
                'errors' => [
                    'required'     => 'Gerente é obrigatório',
                    'max_length'   => 'Gerente precisa ter no máximo 69 caractéres',
                ],
            ],

            'address' => [
                'label'  => 'Endereço',
                'rules'  => "required|max_length[128]",
                'errors' => [
                    'required'     => 'Endereço é obrigatório',
                    'max_length'   => 'Endereço precisa ter no máximo 128 caractéres',
                ],
            ],


            'number_students' => [
                'label'  => 'Nº de estudantes',
                'rules'  => "required|is_natural_no_zero",
                'errors' => [
                    'required' => 'Nº de estudantes é obrigatório',
                ],
            ],



            'active' => [
                'label'  => 'Academia ativa',
                'rules'  => "required|in_list[0,1]",
                'errors' => [
                    'required' => 'Campo ativo é obrigatório',
                    'in_list'  => 'Escolha 0 para inativo ou 1 para ativo',
                ],
            ],

        ];
    }
}
