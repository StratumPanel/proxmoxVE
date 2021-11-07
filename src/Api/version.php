<?php
/*
 * @copyright 2021 Daniel Engelschalk <hello@mrkampf.com>
 */

namespace Stratum\Proxmox\Api;


use Stratum\Proxmox\Helper\PVEPathClassBase;
use Stratum\Proxmox\PVE;

/**
 * Class Version
 * @package Stratum\Proxmox\Api
 */
class Version extends PVEPathClassBase
{

    /**
     * Version constructor.
     * @param PVE $pve
     * @param string $parentAdditional
     */
    public function __construct(PVE $pve, string $parentAdditional)
    {
        parent::__construct($pve, $parentAdditional . 'version/');
    }

    /**
     * API version details. The result also includes the global datacenter confguration.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/index.html#/version
     * @return array|null
     */
    public function get(): ?array
    {
        return $this->getPve()->getApi()->get($this->getPathAdditional());
    }
}