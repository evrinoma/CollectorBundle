<?php

namespace Evrinoma\CollectorBundle\Controller;


use App\Collector\ContrAgent;
use Evrinoma\CollectorBundle\Manager\CollectorManagerInterface;
use Evrinoma\UtilsBundle\Controller\AbstractApiController;
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
    private $collectorManager;
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
     * @Rest\Get("/api/collector/run", name="api_collector_entity", options={"expose"=true})
     * @OA\Get(tags={"collector"})
     * @OA\Response(response=200,description="Get collected entity")
     *
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function collectEntityTypesAction()
    {
        return $this->setSerializeGroup($this->collectorManager->getSerializeGroup())->json($this->collectorManager->setRestOk()->run(), $this->collectorManager->getRestStatus());
    }
//endregion Public

//region SECTION: Getters/Setters
    /**
     * @Rest\Get("/api/collector/get", name="api_collector_get_entity", options={"expose"=true})
     * @OA\Get(tags={"collector"})
     * @OA\Response(response=200,description="Get collected entity by key")
     *
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function getEntityTypesAction()
    {
        return $this->setSerializeGroup($this->collectorManager->getSerializeGroup())->json($this->collectorManager->setRestOk()->get(ContrAgent::class), $this->collectorManager->getRestStatus());
    }
//endregion Getters/Setters
}