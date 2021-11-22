<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface OrderRepository.
 *
 * @package namespace App\Repositories;
 * @method where(string $string, $id)
 */
interface OrderRepository extends RepositoryInterface
{
    public function insert(array $data);

    public function calculate();

    public function calculateMonth($month, $year, $day, $group);
}
