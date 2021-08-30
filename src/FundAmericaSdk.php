<?php

declare(strict_types=1);

namespace JustCoded\FundAmerica;

use JustCoded\FundAmerica\Http\ConnectionConfig;
use JustCoded\FundAmerica\Http\HttpClient;
use JustCoded\FundAmerica\Services\AchAuthorizationsService;
use JustCoded\FundAmerica\Services\BackgroundChecksService;
use JustCoded\FundAmerica\Services\ElectronicSignaturesService;
use JustCoded\FundAmerica\Services\EntityDocumentsService;
use JustCoded\FundAmerica\Services\EntityRelationshipsService;
use JustCoded\FundAmerica\Services\EntitiesService;
use JustCoded\FundAmerica\Services\EscrowAgreementsService;
use JustCoded\FundAmerica\Services\EscrowApplicationsService;
use JustCoded\FundAmerica\Services\InvestmentsService;
use JustCoded\FundAmerica\Services\InvestorsService;
use JustCoded\FundAmerica\Services\OfferingsService;
use JustCoded\FundAmerica\Services\Service;
use JustCoded\FundAmerica\Services\TechServicesAgreementsService;
use RuntimeException;

/**
 * @method EntitiesService entities()
 * @method EntityRelationshipsService entityRelationships()
 * @method EntityDocumentsService entityDocuments()
 * @method InvestorsService investors()
 * @method BackgroundChecksService backgroundChecks()
 * @method OfferingsService offerings()
 * @method EscrowAgreementsService escrowAgreements()
 * @method TechServicesAgreementsService techServicesAgreements()
 * @method ElectronicSignaturesService electronicSignatures()
 * @method EscrowApplicationsService escrowApplications()
 * @method AchAuthorizationsService achAuthorizations()
 * @method InvestmentsService investments()
 */
class FundAmericaSdk
{
    protected ConnectionConfig $config;
    protected array $services = [];

    /**
     * @param ConnectionConfig $config
     */
    public function __construct(ConnectionConfig $config)
    {
        $this->config = $config;
    }

    /**
     * @param $name
     * @param $arguments
     *
     * @return Service|mixed
     */
    public function __call($name, $arguments)
    {
        if (isset($this->services[$name])) {
            return $this->services[$name];
        }

        $service = 'JustCoded\\FundAmerica\\Services\\' . ucwords($name) . 'Service';

        if (! class_exists($service)) {
            throw new RuntimeException("Service {$service} does not exist");
        }

        /** @var Service $service */
        $this->services[$name] = $service::make($this->config);

        return $this->services[$name];
    }

    /**
     * @return HttpClient
     */
    public function getClient(): HttpClient
    {
        return HttpClient::make($this->config->getBaseUrl(), $this->config->getApiKey());
    }
}
