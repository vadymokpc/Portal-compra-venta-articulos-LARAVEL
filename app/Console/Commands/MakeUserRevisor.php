<?php namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class MakeUserRevisor extends Command {
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
   /*  ---------------------------------------------------------------------------------------------------------------------------- */
    protected $signature='rapido:makeUserRevisor';
    /*  ---------------------------------------------------------------------------------------------------------------------------- */
    /**
     * The console command description.
     *
     * @var string
     */
     /*  ---------------------------------------------------------------------------------------------------------------------------- */
    protected $description='Asigna el rol de revisor a un usuario';
     /*  ---------------------------------------------------------------------------------------------------------------------------- */
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle() {
     /*  ------------------------------------------------------Registrar comando para convertir en revisor cualquier usuario---------------------------------------------------------------------- */
        $email=$this->ask("Introducir el correo del usuario");
        $user=User::where('email', $email)->first();

        if( !$user) {
            $this->error("Usuario no encontrado");
            return;
        }

        $user->is_revisor=true;
        $user->save();
        $this->info("El usuario $user->name ya es un revisor");
    }
     /*  ------------------------------------------------------Registrar comando para convertir en revisor cualquier usuario---------------------------------------------------------------------- */
}
