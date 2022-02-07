<?php

namespace Evrinoma\CollectorBundle\Controller;


use App\Collector\ContrAgent;
use Evrinoma\CollectorBundle\Exception\CollectorInvalidException;
use Evrinoma\CollectorBundle\Exception\CollectorNotFoundException;
use Evrinoma\CollectorBundle\Manager\CollectorManagerInterface;
use Evrinoma\UtilsBundle\Controller\AbstractApiController;
use Evrinoma\UtilsBundle\Rest\RestInterface;
use FOS\RestBundle\Controller\Annotations as Rest;
use JMS\Serializer\SerializerInterface;
use OpenApi\Annotations as OA;


/**
 * Class CollectorApiController
 *
 * @package Evrinoma\CollectorBundle\Controller
 */
final class CollectorApiController extends AbstractApiController
{
//region SECTION: Fields
    /**
     * @var CollectorManagerInterface
     */
    private CollectorManagerInterface $collectorManager;
//endregion Fields

//region SECTION: Constructor
    /**
     * SoapApiController constructor.
     *
     * @param SerializerInterface       $serializer
     * @param CollectorManagerInterface $collectorManager
     */
    public function __construct(SerializerInterface $serializer, CollectorManagerInterface $collectorManager)
    {
        parent::__construct($serializer);
        $this->collectorManager = $collectorManager;
    }
//endregion Constructor

//region SECTION: Public
    /**
     * @Rest\Get("/api/collector/run", name="api_collector_run", options={"expose"=true})
     * @OA\Get(tags={"collector"})
     * @OA\Response(response=200,description="Run collector")
     *
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function runAction()
    {

        try {
            $json = $this->collectorManager->setRestOk()->run();
        } catch (\Exception $e) {
            $json = $this->setRestStatus($this->collectorManager, $e);
        }

        return $this->setSerializeGroup($this->collectorManager->getSerializeGroup())->json(['message' => 'Get collector', 'data' => $json], $this->collectorManager->getRestStatus());
    }

//endregion Public
    public function setRestStatus(RestInterface $manager, \Exception $e): array
    {
        switch (true) {
            case $e instanceof CollectorNotFoundException:
                $manager->setRestNotFound();
                break;
            case $e instanceof CollectorInvalidException:
                $manager->setRestUnprocessableEntity();
                break;
            default:
                $manager->setRestBadRequest();
        }

        return ['errors' => $e->getMessage()];
    }
//region SECTION: Getters/Setters

    /**
     * @Rest\Get("/api/collector/get", name="api_collector_get, options={"expose"=true})
     * @OA\Get(tags={"collector"})
     * @OA\Response(response=200,description="Get collected data by key")
     *
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function ggetAction()
    {
        try {
            $json = $this->collectorManager->setRestOk()->get(ContrAgent::class);
        } catch (\Exception $e) {
            $json = $this->setRestStatus($this->collectorManager, $e);
        }

        return $this->setSerializeGroup($this->collectorManager->getSerializeGroup())->json(['message' => 'Get collector', 'data' => $json], $this->collectorManager->getRestStatus());
    }
//endregion Getters/Setters
}