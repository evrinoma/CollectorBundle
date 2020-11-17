<?php

namespace Evrinoma\CollectorBundle\Controller;


use Evrinoma\CollectorBundle\Manager\CollectorManagerInterface;
use Evrinoma\UtilsBundle\Controller\AbstractApiController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Swagger\Annotations as SWG;
use Nelmio\ApiDocBundle\Annotation\Model;
use JMS\Serializer\SerializerInterface;


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
     * @param SerializerInterface  $serializer
     * @param CollectorManagerInterface $collectorManager
     */
    public function __construct(
        SerializerInterface $serializer,
        CollectorManagerInterface $collectorManager
    ) {
        parent::__construct($serializer);
        $this->collectorManager = $collectorManager;
    }
//endregion Constructor

//region SECTION: Public
    /**
     * @Rest\Get("/api/collector/get", name="api_collector_entity")
     * @SWG\Get(tags={"collector"})
     * @SWG\Response(response=200,description="Get collected entity")
     *
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function getEntityTypesAction()
    {
        return $this->setSerializeGroup($this->collectorManager->getSerializeGroup())->json($this->collectorManager->setRestSuccessOk()->run(), $this->collectorManager->getRestStatus());
    }
//endregion Public
}