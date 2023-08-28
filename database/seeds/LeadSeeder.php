    <?php

use Illuminate\Database\Seeder;
use App\Lead;

class LeadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		factory(Lead::class, 10)->create();
    }
}