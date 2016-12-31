<?php namespace App\Console\Commands;

use Illuminate\Console\Command;

class SetupRedis extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'laracms:setup-redis {--show : Display the key instead of modifying files}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate a 10 characters unique string to be used as redis prefix.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $prefix = $this->generateRandomPrefix();

        if ($this->option('show')) {
            return $this->line('<comment>' . $prefix . '</comment>');
        }

        $this->setPrefixInEnvironmentFile($prefix);

        $this->comment(PHP_EOL . 'Redis prefix successfully generated!' . PHP_EOL);
    }

    /**
     * Generate a random prefix for redis.
     *
     * @return string
     */
    protected function generateRandomPrefix()
    {
        return base64_encode(random_bytes(32));
    }

    /**
     * Set redis prefix in the environment file.
     *
     * @param $prefix
     *
     * @return void
     */
    protected function setPrefixInEnvironmentFile($prefix)
    {
        file_put_contents($this->laravel->environmentFilePath(), str_replace(
            'REDIS_PREFIX=' . env('REDIS_PREFIX'),
            'REDIS_PREFIX=' . $prefix,
            file_get_contents($this->laravel->environmentFilePath())
        ));
    }
}
