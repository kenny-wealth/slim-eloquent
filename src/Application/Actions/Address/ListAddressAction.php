<?php
/**
 * Created by PhpStorm.
 * User: kehinde
 * Date: 1/7/20
 * Time: 8:13 AM
 */

namespace App\Application\Actions\Address;


use App\Application\Actions\Action;
use App\Model\AddressBook;
use Illuminate\Database\Eloquent\Model;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Log\LoggerInterface;

class ListAddressAction extends Action
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * @param LoggerInterface $logger
     * @param AddressBook $model
     */
    public function __construct(LoggerInterface $logger, AddressBook $model)
    {
        parent::__construct($logger);
        $this->model = $model;
    }

    /**
     * @return Response
     */
    protected function action(): Response
    {
        $addresses = $this->model::all();

        $this->logger->info("Address list was viewed.");

        return $this->respondWithData($addresses);
    }
}