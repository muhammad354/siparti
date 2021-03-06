<?php

namespace App\Transformers;

use App\Entities\ProgramKerja;
use App\Enum\FaseType;
use League\Fractal\TransformerAbstract;
use App\Entities\Fase;

/**
 * Class FaseTransformer
 * @package namespace App\Transformers;
 */
class FaseTransformer extends TransformerAbstract
{

    protected $defaultIncludes = [
        //'programKerja'
    ];

    /**
     * Transform the \Fase entity
     * @param \Fase $model
     *
     * @return array
     */
    public function transform(Fase $model)
    {
        return [
            'id'               => (int)$model->id,
            'name'             => $model->programKerja['name'],
            'status'           => title_case($model->type),
            'satker'           => $model->satker['name'],
            'fase'             => $model->type,
            'tahun'            => $model->start_date->format('Y'),
            'url'              => route('proker.show', $model->id),
            'description'      => $model->description,
            'excerpt'          => str_limit($model->description, 150),
            'scope'            => $model->scope,
            'target'           => $model->target,
            'progress'         => $model->progress,
            'kendala'          => $model->kendala,
            'instansi_terkait' => $model->instansi_terkait,
            'periode'          => $model->start_date->formatLocalized('%e %B %Y') . ' - ' . $model->end_date->formatLocalized('%e %B %Y'),
            'pic'              => $model->pic,
            'pagu'             => $model->pagu,
            'show_comment'     => (bool)in_array($model->comment_mode, ['show', 'lock']),
            'lock_comment'     => (bool)($model->comment_mode == 'lock'),
            'komentar'         => $model->comment,
            'dukungan'         => $model->vote_up,
            'penolakan'        => $model->vote_down,
            'label'            => (new FaseType($model->type))->label(),
            'media'            => $model->getMedia(),
            'proker_id'        => $model->proker_id,
            'satker_id'        => $model->satker_id,
            'start_date'       =>  $model->start_date->formatLocalized('%e %B %Y'),
            'end_date'         =>  $model->end_date->formatLocalized('%e %B %Y'),
            'tanggal_mulai'    => date("Y-m-d",strtotime($model->start_date)),
            'tanggal_selesai'  => date("Y-m-d",strtotime($model->end_date)),
            'comment_mode'     => $model->comment_mode,
            'tags'             => $model->tagNames(),
            'avaibleTags'      => $model->existingTags(),

            'created_at' => $model->created_at->formatLocalized('%e %B %Y'),
            'updated_at' => $model->updated_at
        ];
    }

    public function includeProgramKerja(Fase $fase)
    {
        return $this->item($fase->programKerja, new ProgramKerjaTransformer());
    }

}
