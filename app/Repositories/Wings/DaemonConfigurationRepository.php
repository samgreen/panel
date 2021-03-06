<?php

namespace Pterodactyl\Repositories\Wings;

use GuzzleHttp\Exception\TransferException;
use Pterodactyl\Exceptions\Http\Connection\DaemonConnectionException;

class DaemonConfigurationRepository extends DaemonRepository
{
    /**
     * Returns system information from the wings instance.
     *
     * @return array
     * @throws \Pterodactyl\Exceptions\Http\Connection\DaemonConnectionException
     */
    public function getSystemInformation(): array
    {
        try {
            $response = $this->getHttpClient()->get('/api/system');
        } catch (TransferException $exception) {
            throw new DaemonConnectionException($exception);
        }

        return json_decode($response->getBody()->__toString(), true);
    }
}
