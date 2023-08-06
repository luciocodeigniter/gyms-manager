<?php

namespace App\Controllers\API\V1;

use App\Entities\Gym;
use App\Models\GymModel;
use App\Validation\Gym as ValidationGym;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class GymsController extends ResourceController
{

    /** @var GymModel The model that holding this resource's data */
    protected $modelName = GymModel::class;

    /** @var string Either 'json' or 'xml'. If blank will be determined through content negotiation. */
    protected $format    = 'json';

    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return ResponseInterface|string|void
     */
    public function index()
    {
        return $this->respond($this->model->findAll());
    }


    /**
     * Return the properties of a resource object
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface|string|void
     */
    public function show($id = null)
    {

        $gym = $this->model->find($id);

        if ($gym === null) {

            return $this->failNotFound();
        }

        return $this->respond($gym);
    }


    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return ResponseInterface|string|void
     */
    public function create()
    {

        // validate post request
        if (!$this->validate(ValidationGym::rules())) {

            return $this->failValidationErrors($this->validator->getErrors());
        }

        /** @var Gym */
        $gym = new Gym($this->request->getPost());

        // create and grab id created
        $id = $this->model->insert($gym);

        return $this->respondCreated($this->model->find($id));
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface|string|void
     */
    public function update($id = null)
    {

        $gym = $this->model->find($id);

        if ($gym === null) {

            return $this->failNotFound();
        }

        // get json request as array, since wee have a raw JSON
        $data = (array) $this->request->getVar();

        // fill all properties to check is was changed
        $gym->fill($data);

        if (!$gym->hasChanged()) {

            return $this->fail('There is no data to update');
        }

        // try update
        $this->model->save($gym);

        // respond
        return $this->respondUpdated($this->model->find($id));
    }

    /**
     * Delete the designated resource object from the model
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface|string|void
     */
    public function delete($id = null)
    {

        $gym = $this->model->find($id);

        if ($gym === null) {

            return $this->failNotFound();
        }

        $this->model->delete($gym->id);


        return $this->respondDeleted();
    }
}
