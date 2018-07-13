<?php

namespace Insighteer\Entities\Bank;

class AccountType
{
    /** @var string */
    private $name;

    /** @var string */
    private $description;

    /** @var bool */
    private $isCommercial;

    public function __construct(
        string $name,
        string $description = '',
        bool $isCommercial = false
    ) {
        $this->name = $name;
        $this->description = $description;
        $this->isCommercial = $isCommercial;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function isCommercial(): bool
    {
        return $this->isCommercial;
    }
}