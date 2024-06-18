<?php

namespace App\Components\Partners;

use Illuminate\Support\Str;

class Tele extends Partner
{
    protected function getBaseUri()
    {
        return $this->getConfigData('domain') . '/';

    }

    public function send_bill($user,$type,$img) {

        $message = '- Khách hàng : '.$user->name.'. ID : '.$user->id
            . "\n- Thanh toán phí thành viên "
            . "\n- Ngày giao dịch " . date(" H:i:s d-m-Y");
//        return $this->makeRequest('https://api.telegram.org/bot5965756215:AAEupzPaaq93ifpvgqE8f2m0SS8rOOUTS9c/sendMessage?chat_id=-4013427394&text='.$message.'' , 'GET');
        $img = 'https://ketnoitoancau.vn'.$img.'';
        return $this->makeRequest('https://api.telegram.org/bot5965756215:AAEupzPaaq93ifpvgqE8f2m0SS8rOOUTS9c/sendPhoto?chat_id=-4013427394&photo='.$img.'&caption='.$message.'' , 'GET');
    }

}

