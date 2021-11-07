<?php
/*
 * @copyright 2021 Daniel Engelschalk <hello@mrkampf.com>
 */

namespace Stratum\Proxmox\Api\Nodes\Node\Hardware\Pci;

use Stratum\Proxmox\Api\Nodes\Node\Hardware\Pci\PciId\Mdev;
use Stratum\Proxmox\Helper\PVEPathClassBase;
use Stratum\Proxmox\PVE;

/**
 * Class PciId
 * @package Stratum\Proxmox\Api\Nodes\Node\Qemu
 */
class PciId extends PVEPathClassBase
{
    /**
     * Init constructor.
     * @param PVE $pve
     * @param string $parentAdditional
     */
    public function __construct(PVE $pve, string $parentAdditional)
    {
        parent::__construct($pve, $parentAdditional);
    }

    /**
     * List mediated device types for given PCI device.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/hardware/pci/{pciid}/mdev
     * @return \Stratum\Proxmox\Api\Nodes\Node\Hardware\Pci\PciId\Mdev
     */
    public function hardware(): Mdev
    {
        return new Mdev($this->getPve(), $this->getPathAdditional());
    }

    /**
     * Index of available pci methods
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/hardware/pci/{pciid}
     * @return array|null
     */
    public function get(): ?array
    {
        return $this->getPve()->getApi()->get($this->getPathAdditional());
    }
}