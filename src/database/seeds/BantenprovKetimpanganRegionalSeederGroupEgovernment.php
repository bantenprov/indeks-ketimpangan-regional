<?php

/* Require */
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

/* Models */
use Bantenprov\KetimpanganRegional\Models\Bantenprov\KetimpanganRegional\KetimpanganRegional;

class BantenprovKetimpanganRegionalSeederKetimpanganRegional extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
	public function run()
	{
        Model::unguard();

        $ketimpangan_regionals = (object) [
            (object) [
                'label' => 'G2G',
                'description' => 'Goverment to Goverment',
            ],
            (object) [
                'label' => 'G2E',
                'description' => 'Goverment to Employee',
            ],
            (object) [
                'label' => 'G2C',
                'description' => 'Goverment to Citizen',
            ],
            (object) [
                'label' => 'G2B',
                'description' => 'Goverment to Business',
            ],
        ];

        foreach ($ketimpangan_regionals as $ketimpangan_regional) {
            $model = KetimpanganRegional::updateOrCreate(
                [
                    'label' => $ketimpangan_regional->label,
                ],
                [
                    'description' => $ketimpangan_regional->description,
                ]
            );
            $model->save();
        }
	}
}
