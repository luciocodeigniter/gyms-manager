<?php

declare(strict_types=1);

namespace App\Libraries;

use App\Models\GymModel;

class GymService
{

    /**
     * Render HTML table with gyms database
     *
     * @return string
     */
    public function renderGyms(): string
    {
        $table = new \CodeIgniter\View\Table([
            'table_open' => '<table class="table table-striped" id="dataTable" width="100%" cellspacing="0">',
        ]);


        // get data
        $gyms = model(GymModel::class)->orderBy('name', 'ASC')->findAll();

        if (empty($gyms)) {

            return '<div class="text-info">Não há dados para serem exibidos</div>';
        }

        $table->setHeading('Ações', 'Nome', 'Telefone', 'Endereço', 'Situação', 'Criada');

        foreach ($gyms as $gym) {

            $table->addRow(
                [
                    $this->renderBtnActions($gym->id),
                    $gym->name,
                    $gym->phone,
                    $gym->address,
                    $gym->status(),
                    $gym->created_at,
                ]
            );
        }

        // render as string
        return $table->generate();
    }

    /**
     * Renders buttons with actions for each gym
     *
     * @param integer $id
     * @return string
     */
    private function renderBtnActions(int $id): string
    {
        $btnActions = anchor(route_to('gyms.edit', $id), 'Editar', ['class' => 'btn btn-primary btn-sm']);
        $btnActions .= $this->renderBtndestroy($id);

        return $btnActions;
    }


    /**
     * Renders a button with HTML form for record deletion.
     *
     * @param integer $id
     * @return string
     */
    private function renderBtndestroy(int $id): string
    {

        $formAttributes = [
            'class'     => 'd-inline',
            'onsubmit'  => 'return confirm("Tem certeza da exclusão?");',
        ];

        $form = form_open(route_to('gyms.destroy', $id), $formAttributes, ['_method' => 'DELETE']);

        $form .= form_button([
            'class'   => 'btn btn-sm btn-danger',
            'type'    => 'submit',
            'content' => 'Destruir'
        ]);

        $form .= form_close();

        return $form;
    }
}
