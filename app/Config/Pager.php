<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Pager extends BaseConfig
{
    /**
     * --------------------------------------------------------------------------
     * Templates
     * --------------------------------------------------------------------------
     *
     * Pagination links are rendered out using views to configure their
     * appearance. This array contains aliases and the view names to
     * use when rendering the links.
     *
     * Within each view, the Pager object will be available as $pager,
     * and the desired group as $pagerGroup;
     *
     * @var array<string, string>
     */
    public $templates = [
        'default_full'   => 'CodeIgniter\Pager\Views\default_full',
        'default_simple' => 'CodeIgniter\Pager\Views\default_simple',
        'default_head'   => 'CodeIgniter\Pager\Views\default_head',

        'kk_pagination' => 'App\Views\Pagers\kk_pagination',
        'kia_pagination' => 'App\Views\Pagers\kia_pagination',
        'kkperceraian_pagination' => 'App\Views\Pagers\kkperceraian_pagination',
        'kkpemisahan_pagination' => 'App\Views\Pagers\kkpemisahan_pagination',
        'kkpenambahan_pagination' => 'App\Views\Pagers\kkpenambahan_pagination',
        'kkpengurangan_pagination' => 'App\Views\Pagers\kkpengurangan_pagination',
        'kkperubahan_pagination' => 'App\Views\Pagers\kkperubahan_pagination',
        'suratperpindahan_pagination' => 'App\Views\Pagers\suratperpindahan_pagination',
        'suratperpindahanluar_pagination' => 'App\Views\Pagers\suratperpindahanluar_pagination',

        'aktakelahiran_pagination' => 'App\Views\Pagers\aktakelahiran_pagination',
        'aktakematian_pagination' => 'App\Views\Pagers\aktakematian_pagination',
        'keabsahanaktakelahiran_pagination' => 'App\Views\Pagers\keabsahanaktakelahiran_pagination',

        'pelayanandata_pagination' => 'App\Views\Pagers\pelayanandata_pagination',

        'perbaikandata_pagination' => 'App\Views\Pagers\perbaikandata_pagination',
        'pengaduanupdate_pagination' => 'App\Views\Pagers\pengaduanupdate_pagination',

        'perbaikannik_pagination' => 'App\Views\Pagers\perbaikannik_pagination'
    ];

    /**
     * --------------------------------------------------------------------------
     * Items Per Page
     * --------------------------------------------------------------------------
     *
     * The default number of results shown in a single page.
     *
     * @var int
     */
    public $perPage = 20;
}
