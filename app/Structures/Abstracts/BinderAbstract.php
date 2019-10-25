<?php
namespace App\Structure\Abstracts;

use Illuminate\Support\Collection;
use Infrastructure\Interfaces\IncomeInterface;
use Infrastructure\Traits\BuildIncomeServiceTrait;

abstract class BinderAbstract
{
    use BuildIncomeServiceTrait;

    /**
     * @var object The result that must passed to above layer.
     */
    private $result;

    /**
     * @var IncomeInterface The income parameter.
     */
    protected $income;

    /**
     * Bind the necessary relationships and dependencies to model.
     *
     * @param EntityAbstract $entity
     *
     * @return array
     */
    abstract protected function bindDependencies($entity): array;

    /**
     * BinderAbstract constructor.
     *
     * @param array|Collection|EntityAbstract $result
     * @param IncomeInterface $income
     */
    final public function __construct($result, IncomeInterface $income)
    {
        $this->result = $result;
        $this->income = $income;
    }

    /**
     * Return bind result.
     *
     * @return array
     */
    final public function getBindResult()
    {
        if ($this->result instanceof Collection) {
            return $this->bindCollection();
        }

        return $this->bindEntity($this->result);
    }

    /**
     * Return the collection with its dependencies.
     *
     * @return array
     */
    private function bindCollection()
    {
        $result = [];

        foreach ($this->result as $entity) {
            $data = $this->bindEntity($entity);

            if (count($data) > 0) {
                $result[] = $data;
            }
        }

        return $result;
    }

    /**
     * Return the entity with its dependencies.
     *
     * @param $entity
     *
     * @return array
     */
    private function bindEntity($entity): array
    {
        if ($entity instanceof EntityAbstract) {
            return $this->bindDependencies($entity);
        }

        return [];
    }
}
