<?php

namespace App\Services\Logger;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MongoLogger implements LoggerInterface
{
    protected $collection = 'logs';
    protected $counterCollection = 'counters';

    public function log(string $acao, string $detalhes, ?int $referencia = null): void
    {
        $id = $this->getNextId();
        DB::connection('mongodb')->table($this->collection)->insert([
            '_id'        => $id,
            'acao'       => $acao,
            'detalhes'   => $detalhes,
            'referencia' => $referencia,
            'data_hora'  => Carbon::now()->format('d/m/Y H:i:s')
        ]);
    }

    protected function getNextId(): int
    {
        $countersCollection = DB::connection('mongodb')->getMongoDB()->selectCollection($this->counterCollection);
        $counter = $countersCollection->findOneAndUpdate(
            ['_id' => $this->collection],
            ['$inc' => ['seq' => 1]],
            [
                'returnDocument' => \MongoDB\Operation\FindOneAndUpdate::RETURN_DOCUMENT_AFTER,
                'upsert' => true
            ]
        );
        return $counter['seq'] ?? 1;
    }
}
