<?php
/*
 * @copyright 2021 Daniel Engelschalk <hello@mrkampf.com>
 */

namespace Stratum\Proxmox\Api\Cluster;

use Stratum\Proxmox\Api\Cluster\Ha\Groups;
use Stratum\Proxmox\Api\Cluster\Ha\Resources;
use Stratum\Proxmox\Api\Cluster\Ha\Status;
use Stratum\Proxmox\Helper\PVEPathClassBase;
use Stratum\Proxmox\PVE;

/**
 * Class Ha
 * @package Stratum\Proxmox\Api\Cluster
 */
class Ha extends PVEPathClassBase
{
    /**
     * Ha constructor.
     * @param PVE $pve
     * @param string $parentAdditional
     */
    public function __construct(PVE $pve, string $parentAdditional)
    {
        parent::__construct($pve, $parentAdditional . 'ha/');
    }

    /**
     * Get HA groups.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/cluster/ha/groups
     * @return Groups
     */
    public function groups(): Groups
    {
        return new Groups($this->getPve(), $this->getPathAdditional());
    }

    /**
     * List HA resources.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/cluster/ha/resources
     * @return Resources
     */
    public function resources(): Resources
    {
        return new Resources($this->getPve(), $this->getPathAdditional());
    }

    /**
     * List HA resources.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/cluster/ha/status
     * @return Status
     */
    public function status(): Status
    {
        return new Status($this->getPve(), $this->getPathAdditional());
    }

    /**
     * Directory index.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/cluster/ha
     * @return array|null
     */
    public function get(): ?array
    {
        return $this->getPve()->getApi()->get($this->getPathAdditional());
    }

}