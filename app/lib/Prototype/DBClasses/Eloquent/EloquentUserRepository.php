<?php
namespace Prototype\DBClasses\Eloquent;
use Prototype\Interfaces\UserRepository;
use Prototype\BaseClasses\AbstractEloquentRepository;

class EloquentUserRepository extends AbstractEloquentRepository implements UserRepository
{
    
    /**
     * @var Model
     */
    protected $model;
    
    /**
     * Constructor
     */
    public function __construct(\User $model) {
        $this->model = $model;
    }

    /**
     * Create new model
     *
     * @param array $input
     */
    public function save() {
        $object = new \User;
        if ($object->save())
            return $object;
        return true;
    }
       
}