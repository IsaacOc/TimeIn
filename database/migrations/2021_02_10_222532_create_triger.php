<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTriger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        DB::unprepared('
        CREATE TRIGGER tr_User AFTER INSERT ON `users` FOR EACH ROW
        BEGIN
         INSERT INTO user_tr (`name`, `email`, `role`, `user_id`, `created_at` ) VALUES (NEW.Name, NEW.Email, NEW.role, NEW.id, now() );
        END
        ');

        DB::unprepared('
        CREATE TRIGGER tr_Logs AFTER INSERT ON `Logs` FOR EACH ROW
        BEGIN
         INSERT INTO Logs_tr (`Role`, `Email`, `Date_In`, `Time_In`,`Time_Out`, `created_at` ) VALUES (NEW.Role, NEW.Email, NEW.Date_In, NEW.Time_In, NEW.Time_Out,  now() );
        END
        ');

        DB::unprepared('
        CREATE TRIGGER tr_Logs_update AFTER UPDATE ON `Logs` FOR EACH ROW
        BEGIN
         UPDATE Logs_tr SET Time_Out = NEW.Time_Out, updated_at = now()  WHERE id =  NEW.id ;
        END
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        DB::unprepared('DROP TRIGGER `tr_User`');
        DB::unprepared('DROP TRIGGER `tr_Logs`');
        DB::unprepared('DROP TRIGGER `tr_Logs_update`');
    }
}
