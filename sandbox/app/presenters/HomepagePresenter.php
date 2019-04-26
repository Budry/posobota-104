<?php

declare(strict_types=1);

namespace App\Presenters;


use Nette\Database\Connection;

final class HomepagePresenter extends BasePresenter
{
    public function __construct(Connection $connection)
    {
        //dump($connection->query("SELECT * FROM messages")->fetchAll());
        //die();
    }
	public function renderDefault(): void
    {
    }
}
