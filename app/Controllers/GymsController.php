<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Entities\Gym;
use App\Libraries\GymService;
use App\Models\GymModel;
use App\Validation\Gym as ValidationGym;
use CodeIgniter\Config\Factories;
use CodeIgniter\HTTP\RedirectResponse;
use CodeIgniter\View\RendererInterface;

class GymsController extends BaseController
{

    /** @var GymService */
    private GymService $gymService;

    /**
     * Construct
     */
    public function __construct()
    {
        // fill property class
        $this->gymService = Factories::class(GymService::class);
    }


    /**
     * Render view to manage gyms
     *
     * @return RendererInterface
     */
    public function index()
    {
        $data = [
            'title' => 'Gerenciar academias',
            'gyms'  => $this->gymService->renderGyms()
        ];


        return view('Gyms/index', $data);
    }


    /**
     * Render view to create a new gym
     *
     * @return RendererInterface
     */
    public function new()
    {
        $data = [
            'title' => 'Criar academia',
            'gym'   => new Gym()
        ];

        return view('Gyms/new', $data);
    }


    /**
     * Create a gym
     *
     * @return RedirectResponse
     */
    public function create(): RedirectResponse
    {

        // validate the request
        if (!$this->validate(ValidationGym::rules())) {

            return redirect()->back()->withInput()->with('errorsValidation', $this->validator->getErrors());
        }

        /**
         * @var Gym instantiating a new gym object populates the properties with the content of the post request
         */
        $gym = new Gym($this->request->getPost());

        // try create a gym
        model(GymModel::class)->insert($gym);

        // all good
        return redirect()->route('gyms')->with('success', 'Sucesso!');
    }


    /**
     * Render view to update a gym
     *
     * @param integer $id
     * @return RendererInterface
     */
    public function edit(int $id)
    {

        $data = [
            'title' => 'Editar academia',
            'gym'   => model(GymModel::class)->findOrFail($id)
        ];

        return view('Gyms/edit', $data);
    }


    /**
     * Update a gym
     *
     * @param integer $id
     * @return RedirectResponse
     */
    public function update(int $id): RedirectResponse
    {

        // validate the request
        if (!$this->validate(ValidationGym::rules($id))) {

            return redirect()->back()->withInput()->with('errorsValidation', $this->validator->getErrors());
        }

        /**
         * @var Gym get the gym
         */
        $gym = model(GymModel::class)->findOrFail($id);

        // populates the properties with the content of the post request
        $gym->fill($this->request->getPost());

        // gym has any property changed?
        if (!$gym->hasChanged()) {

            return redirect()->back()->with('info', 'Não há dados para atualizar');
        }

        // try update a gym
        model(GymModel::class)->save($gym);

        // all good
        return redirect()->route('gyms')->with('success', 'Sucesso!');
    }


    /**
     * Destroy a gym
     *
     * @param integer $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {

        model(GymModel::class)->delete($id);

        // all good
        return redirect()->route('gyms')->with('success', 'Sucesso!');
    }
}
