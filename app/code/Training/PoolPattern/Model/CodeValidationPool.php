<?php

declare(strict_types=1);

namespace Training\PoolPattern\Model;

class CodeValidationPool
{
    /**
     * @var array|CodeValidationInterface[]
     */
    protected array $validations;

    /**
     * CodeValidationPool constructor.
     *
     * @param array|CodeValidationInterface[] $validations
     */
    public function __construct(array $validations)
    {
        $this->validations = $validations;
    }

    public function validate(string $code): void
    {
        foreach ($this->validations as $validation) {
            $validation->validate($code);
        }
    }
}
