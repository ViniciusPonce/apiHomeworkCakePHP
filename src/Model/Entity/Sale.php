<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Sale Entity
 *
 * @property int $id
 * @property int $seller_id
 * @property string $value
 * @property string $comission
 * @property \Cake\I18n\FrozenTime $created_at
 *
 * @property \App\Model\Entity\Seller $seller
 */
class Sale extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'seller_id' => true,
        'value' => true,
        'comission' => true,
        'created_at' => true,
        'seller' => true,
    ];
}
