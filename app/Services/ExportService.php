<?php

namespace App\Services;

use App\Contracts\ImportExport;
use App\Contracts\Service;
use App\Services\ImportExport\AircraftExporter;
use App\Services\ImportExport\AirportExporter;
use App\Services\ImportExport\ExpenseExporter;
use App\Services\ImportExport\FareExporter;
use App\Services\ImportExport\FlightExporter;
use App\Services\ImportExport\SubfleetExporter;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use League\Csv\CharsetConverter;
use League\Csv\Writer;

class ExportService extends Service
{
    /**
     * @param string $path
     * 
     * Abuelo007X: Adding $open_mode as parameter
     * 
     */
    public function openCsv($path, $open_mode): Writer
    {
        $writer = Writer::createFromPath($path, $open_mode);
        CharsetConverter::addTo($writer, 'utf-8', 'utf-8');

        return $writer;
    }

    /**
     * Run the actual exporter
     *
     *
     * @throws \League\Csv\CannotInsertRecord
     * 
     *      
     * Abuelo007X: 
     * - Adding $ChunkIndex Variable as optional used by exportFlights function this to be able to change between append and write mode
     */
    protected function runExport(Collection $collection, ImportExport $exporter, $chunkIndex = null, $timeStamp = null): string
    {
        $filename = 'export_'.$exporter->assetType.'.'.$timeStamp.'.csv';

        // Create the directory - makes it inside of storage/app
        Storage::makeDirectory('import');
        $path = storage_path('/app/import/export_'.$filename.'.csv');

        if ($chunkIndex > 1) {
            $writer = $this->openCsv($path, 'a+');
            Log::info('Exporting Append Mode "'.$exporter->assetType.'" to '.$path.' Chunk '.$chunkIndex);
        } else {
            $writer = $this->openCsv($path, 'w+');
            // Write out the header first
            $writer->insertOne($exporter->getColumns());
            Log::info('Exporting Write mode "'.$exporter->assetType.'" to '.$path.' Chunk '.$chunkIndex);
        }


        // Write the rest of the rows
        foreach ($collection as $row) {
            $ins = $exporter->export($row);
            $writer->insertOne($ins);
        }

        return $path;
    }

    /**
     * Export all of the aircraft
     *
     * @param  Collection $aircraft
     * @return mixed
     *
     * @throws \League\Csv\CannotInsertRecord
     */
    public function exportAircraft($aircraft)
    {
        return $this->runExport($aircraft, new AircraftExporter());
    }

    /**
     * Export all of the airports
     *
     * @param  Collection $airports
     * @return mixed
     *
     * @throws \League\Csv\CannotInsertRecord
     */
    public function exportAirports($airports)
    {
        return $this->runExport($airports, new AirportExporter());
    }

    /**
     * Export all of the airports
     *
     * @param  Collection $expenses
     * @return mixed
     *
     * @throws \League\Csv\CannotInsertRecord
     */
    public function exportExpenses($expenses)
    {
        return $this->runExport($expenses, new ExpenseExporter());
    }

    /**
     * Export all of the fares
     *
     * @param  Collection $fares
     * @return mixed
     *
     * @throws \League\Csv\CannotInsertRecord
     */
    public function exportFares($fares)
    {
        return $this->runExport($fares, new FareExporter());
    }

    /**
     * Export all of the flights
     *
     * @param  Collection $flights
     * @return mixed
     *
     * @throws \League\Csv\CannotInsertRecord
     * 
     * Abuelo007X: Adding $ChunkIndex Variable from Admin FlightController change
     * 
     */
    public function exportFlights($flights, $chunkIndex, $timeStamp)
    {
        return $this->runExport($flights, new FlightExporter(), $chunkIndex, $timeStamp);
    }

    /**
     * Export all of the flights
     *
     * @param  Collection $subfleets
     * @return mixed
     *
     * @throws \League\Csv\CannotInsertRecord
     */
    public function exportSubfleets($subfleets)
    {
        return $this->runExport($subfleets, new SubfleetExporter());
    }
}
