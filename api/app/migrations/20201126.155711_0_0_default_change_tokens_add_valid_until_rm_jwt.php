<?php

namespace Migration;

use Spiral\Migrations\Migration;

class OrmDefaultFa3d68fa663a27a6f207ab2519d40ebe extends Migration
{
    protected const DATABASE = 'default';

    public function up()
    {
        $this->table('tokens')
            ->addColumn('valid_until', 'date', [
                'nullable' => false,
                'default'  => null
            ])
            ->dropColumn('jwt')
            ->update();
    }

    public function down()
    {
        $this->table('tokens')
            ->addColumn('jwt', 'text', [
                'nullable' => false,
                'default'  => null
            ])
            ->dropColumn('valid_until')
            ->update();
    }
}
