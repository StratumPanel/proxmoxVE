<?php
/*
 * @copyright 2021 Daniel Engelschalk <hello@mrkampf.com>
 */

namespace Proxmox\Api\Nodes\Node\Qemu\VmId;

use Proxmox\Api\Nodes\Node\Qemu\VmId\Snapshot\Snapname;
use Proxmox\Helper\PVEPathClassBase;
use Proxmox\PVE;

/**
 * Class Unlink
 * @package Proxmox\Api\Nodes\Node\Qemu\VmId
 */
class Unlink extends PVEPathClassBase
{
    /**
     * Init constructor.
     * @param PVE $pve
     * @param string $parentAdditional
     */
    public function __construct(PVE $pve, string $parentAdditional)
    {
        parent::__construct($pve, $parentAdditional . 'unlink/');
    }

    /**
     * Unlink/delete disk images.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/qemu/{vmid}/unlink
     * @param $params array
     * @return array|null
     */
    public function put(array $params = []): ?array
    {
        return $this->getPve()->getApi()->put($this->getPathAdditional(), $params);
    }
}