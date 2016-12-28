<?php

namespace App\Jobs;

use Storage;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SaveImagetoS3
{
    use InteractsWithQueue, Queueable, SerializesModels;

    protected $filePath;
    protected $image;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($filePath, $image)
    {
        $this->filePath = $filePath;
        $this->image = $image;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $s3 = Storage::disk('s3');
        $s3->put($this->filePath, file_get_contents($this->image), 'public');
    }
}
