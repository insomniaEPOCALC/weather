<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Location;

class LocationSeeder extends Seeder
{
    public function run()
    {
$locations = [
            // 北海道
            ['prefecture' => '北海道', 'name' => '稚内', 'api_id' => '011000', 'display_top' => 0],
            ['prefecture' => '北海道', 'name' => '旭川', 'api_id' => '012010', 'display_top' => 0],
            ['prefecture' => '北海道', 'name' => '留萌', 'api_id' => '012020', 'display_top' => 0],
            ['prefecture' => '北海道', 'name' => '網走', 'api_id' => '013010', 'display_top' => 0],
            ['prefecture' => '北海道', 'name' => '北見', 'api_id' => '013020', 'display_top' => 0],
            ['prefecture' => '北海道', 'name' => '紋別', 'api_id' => '013030', 'display_top' => 0],
            ['prefecture' => '北海道', 'name' => '根室', 'api_id' => '014010', 'display_top' => 0],
            ['prefecture' => '北海道', 'name' => '釧路', 'api_id' => '014020', 'display_top' => 0],
            ['prefecture' => '北海道', 'name' => '帯広', 'api_id' => '014030', 'display_top' => 0],
            ['prefecture' => '北海道', 'name' => '室蘭', 'api_id' => '015010', 'display_top' => 0],
            ['prefecture' => '北海道', 'name' => '浦河', 'api_id' => '015020', 'display_top' => 0],
            ['prefecture' => '北海道', 'name' => '札幌', 'api_id' => '016010', 'display_top' => 1],
            ['prefecture' => '北海道', 'name' => '岩見沢', 'api_id' => '016020', 'display_top' => 0],
            ['prefecture' => '北海道', 'name' => '倶知安', 'api_id' => '016030', 'display_top' => 0],
            ['prefecture' => '北海道', 'name' => '函館', 'api_id' => '017010', 'display_top' => 0],
            ['prefecture' => '北海道', 'name' => '江差', 'api_id' => '017020', 'display_top' => 0],

            // 東北
            ['prefecture' => '青森県', 'name' => '青森', 'api_id' => '020010', 'display_top' => 0],
            ['prefecture' => '青森県', 'name' => 'むつ', 'api_id' => '020020', 'display_top' => 0],
            ['prefecture' => '青森県', 'name' => '八戸', 'api_id' => '020030', 'display_top' => 0],
            ['prefecture' => '岩手県', 'name' => '盛岡', 'api_id' => '030010', 'display_top' => 0],
            ['prefecture' => '岩手県', 'name' => '宮古', 'api_id' => '030020', 'display_top' => 0],
            ['prefecture' => '岩手県', 'name' => '大船渡', 'api_id' => '030030', 'display_top' => 0],
            ['prefecture' => '宮城県', 'name' => '仙台', 'api_id' => '040010', 'display_top' => 0],
            ['prefecture' => '宮城県', 'name' => '白石', 'api_id' => '040020', 'display_top' => 0],
            ['prefecture' => '秋田県', 'name' => '秋田', 'api_id' => '050010', 'display_top' => 0],
            ['prefecture' => '秋田県', 'name' => '横手', 'api_id' => '050020', 'display_top' => 0],
            ['prefecture' => '山形県', 'name' => '山形', 'api_id' => '060010', 'display_top' => 0],
            ['prefecture' => '山形県', 'name' => '米沢', 'api_id' => '060020', 'display_top' => 0],
            ['prefecture' => '山形県', 'name' => '酒田', 'api_id' => '060030', 'display_top' => 0],
            ['prefecture' => '山形県', 'name' => '新庄', 'api_id' => '060040', 'display_top' => 0],
            ['prefecture' => '福島県', 'name' => '福島', 'api_id' => '070010', 'display_top' => 0],
            ['prefecture' => '福島県', 'name' => '小名浜', 'api_id' => '070020', 'display_top' => 0],
            ['prefecture' => '福島県', 'name' => '若松', 'api_id' => '070030', 'display_top' => 0],

            // 関東
            ['prefecture' => '茨城県', 'name' => '水戸', 'api_id' => '080010', 'display_top' => 0],
            ['prefecture' => '茨城県', 'name' => '土浦', 'api_id' => '080020', 'display_top' => 0],
            ['prefecture' => '栃木県', 'name' => '宇都宮', 'api_id' => '090010', 'display_top' => 0],
            ['prefecture' => '栃木県', 'name' => '大田原', 'api_id' => '090020', 'display_top' => 0],
            ['prefecture' => '群馬県', 'name' => '前橋', 'api_id' => '100010', 'display_top' => 0],
            ['prefecture' => '群馬県', 'name' => 'みなかみ', 'api_id' => '100020', 'display_top' => 0],
            ['prefecture' => '埼玉県', 'name' => 'さいたま', 'api_id' => '110010', 'display_top' => 0],
            ['prefecture' => '埼玉県', 'name' => '熊谷', 'api_id' => '110020', 'display_top' => 0],
            ['prefecture' => '埼玉県', 'name' => '秩父', 'api_id' => '110030', 'display_top' => 0],
            ['prefecture' => '千葉県', 'name' => '千葉', 'api_id' => '120010', 'display_top' => 0],
            ['prefecture' => '千葉県', 'name' => '銚子', 'api_id' => '120020', 'display_top' => 0],
            ['prefecture' => '千葉県', 'name' => '館山', 'api_id' => '120030', 'display_top' => 0],
            ['prefecture' => '東京都', 'name' => '東京', 'api_id' => '130010', 'display_top' => 1],
            ['prefecture' => '東京都', 'name' => '大島', 'api_id' => '130020', 'display_top' => 0],
            ['prefecture' => '東京都', 'name' => '八丈島', 'api_id' => '130030', 'display_top' => 0],
            ['prefecture' => '東京都', 'name' => '父島', 'api_id' => '130040', 'display_top' => 0],
            ['prefecture' => '神奈川県', 'name' => '横浜', 'api_id' => '140010', 'display_top' => 0],
            ['prefecture' => '神奈川県', 'name' => '小田原', 'api_id' => '140020', 'display_top' => 0],

            // 中部
            ['prefecture' => '新潟県', 'name' => '新潟', 'api_id' => '150010', 'display_top' => 0],
            ['prefecture' => '新潟県', 'name' => '長岡', 'api_id' => '150020', 'display_top' => 0],
            ['prefecture' => '新潟県', 'name' => '高田', 'api_id' => '150030', 'display_top' => 0],
            ['prefecture' => '新潟県', 'name' => '相川', 'api_id' => '150040', 'display_top' => 0],
            ['prefecture' => '富山県', 'name' => '富山', 'api_id' => '160010', 'display_top' => 0],
            ['prefecture' => '富山県', 'name' => '伏木', 'api_id' => '160020', 'display_top' => 0],
            ['prefecture' => '石川県', 'name' => '金沢', 'api_id' => '170010', 'display_top' => 0],
            ['prefecture' => '石川県', 'name' => '輪島', 'api_id' => '170020', 'display_top' => 0],
            ['prefecture' => '福井県', 'name' => '福井', 'api_id' => '180010', 'display_top' => 0],
            ['prefecture' => '福井県', 'name' => '敦賀', 'api_id' => '180020', 'display_top' => 0],
            ['prefecture' => '山梨県', 'name' => '甲府', 'api_id' => '190010', 'display_top' => 0],
            ['prefecture' => '山梨県', 'name' => '河口湖', 'api_id' => '190020', 'display_top' => 0],
            ['prefecture' => '長野県', 'name' => '長野', 'api_id' => '200010', 'display_top' => 0],
            ['prefecture' => '長野県', 'name' => '松本', 'api_id' => '200020', 'display_top' => 0],
            ['prefecture' => '長野県', 'name' => '飯田', 'api_id' => '200030', 'display_top' => 0],
            ['prefecture' => '岐阜県', 'name' => '岐阜', 'api_id' => '210010', 'display_top' => 0],
            ['prefecture' => '岐阜県', 'name' => '高山', 'api_id' => '210020', 'display_top' => 0],
            ['prefecture' => '静岡県', 'name' => '静岡', 'api_id' => '220010', 'display_top' => 0],
            ['prefecture' => '静岡県', 'name' => '網代', 'api_id' => '220020', 'display_top' => 0],
            ['prefecture' => '静岡県', 'name' => '三島', 'api_id' => '220030', 'display_top' => 0],
            ['prefecture' => '静岡県', 'name' => '浜松', 'api_id' => '220040', 'display_top' => 0],
            ['prefecture' => '愛知県', 'name' => '名古屋', 'api_id' => '230010', 'display_top' => 0],
            ['prefecture' => '愛知県', 'name' => '豊橋', 'api_id' => '230020', 'display_top' => 0],

            // 近畿
            ['prefecture' => '三重県', 'name' => '津', 'api_id' => '240010', 'display_top' => 0],
            ['prefecture' => '三重県', 'name' => '尾鷲', 'api_id' => '240020', 'display_top' => 0],
            ['prefecture' => '滋賀県', 'name' => '大津', 'api_id' => '250010', 'display_top' => 0],
            ['prefecture' => '滋賀県', 'name' => '彦根', 'api_id' => '250020', 'display_top' => 0],
            ['prefecture' => '京都府', 'name' => '京都', 'api_id' => '260010', 'display_top' => 0],
            ['prefecture' => '京都府', 'name' => '舞鶴', 'api_id' => '260020', 'display_top' => 0],
            ['prefecture' => '大阪府', 'name' => '大阪', 'api_id' => '270000', 'display_top' => 1],
            ['prefecture' => '兵庫県', 'name' => '神戸', 'api_id' => '280010', 'display_top' => 0],
            ['prefecture' => '兵庫県', 'name' => '豊岡', 'api_id' => '280020', 'display_top' => 0],
            ['prefecture' => '奈良県', 'name' => '奈良', 'api_id' => '290010', 'display_top' => 0],
            ['prefecture' => '奈良県', 'name' => '風屋', 'api_id' => '290020', 'display_top' => 0],
            ['prefecture' => '和歌山県', 'name' => '和歌山', 'api_id' => '300010', 'display_top' => 0],
            ['prefecture' => '和歌山県', 'name' => '潮岬', 'api_id' => '300020', 'display_top' => 0],

            // 中国
            ['prefecture' => '鳥取県', 'name' => '鳥取', 'api_id' => '310010', 'display_top' => 0],
            ['prefecture' => '鳥取県', 'name' => '米子', 'api_id' => '310020', 'display_top' => 0],
            ['prefecture' => '島根県', 'name' => '松江', 'api_id' => '320010', 'display_top' => 0],
            ['prefecture' => '島根県', 'name' => '浜田', 'api_id' => '320020', 'display_top' => 0],
            ['prefecture' => '島根県', 'name' => '西郷', 'api_id' => '320030', 'display_top' => 0],
            ['prefecture' => '岡山県', 'name' => '岡山', 'api_id' => '330010', 'display_top' => 0],
            ['prefecture' => '岡山県', 'name' => '津山', 'api_id' => '330020', 'display_top' => 0],
            ['prefecture' => '広島県', 'name' => '広島', 'api_id' => '340010', 'display_top' => 0],
            ['prefecture' => '広島県', 'name' => '庄原', 'api_id' => '340020', 'display_top' => 0],
            ['prefecture' => '山口県', 'name' => '下関', 'api_id' => '350010', 'display_top' => 0],
            ['prefecture' => '山口県', 'name' => '山口', 'api_id' => '350020', 'display_top' => 0],
            ['prefecture' => '山口県', 'name' => '柳井', 'api_id' => '350030', 'display_top' => 0],
            ['prefecture' => '山口県', 'name' => '萩', 'api_id' => '350040', 'display_top' => 0],

            // 四国
            ['prefecture' => '徳島県', 'name' => '徳島', 'api_id' => '360010', 'display_top' => 0],
            ['prefecture' => '徳島県', 'name' => '日和佐', 'api_id' => '360020', 'display_top' => 0],
            ['prefecture' => '香川県', 'name' => '高松', 'api_id' => '370000', 'display_top' => 0],
            ['prefecture' => '愛媛県', 'name' => '松山', 'api_id' => '380010', 'display_top' => 0],
            ['prefecture' => '愛媛県', 'name' => '新居浜', 'api_id' => '380020', 'display_top' => 0],
            ['prefecture' => '愛媛県', 'name' => '宇和島', 'api_id' => '380030', 'display_top' => 0],
            ['prefecture' => '高知県', 'name' => '高知', 'api_id' => '390010', 'display_top' => 0],
            ['prefecture' => '高知県', 'name' => '室戸岬', 'api_id' => '390020', 'display_top' => 0],
            ['prefecture' => '高知県', 'name' => '清水', 'api_id' => '390030', 'display_top' => 0],

            // 九州・沖縄
            ['prefecture' => '福岡県', 'name' => '福岡', 'api_id' => '400010', 'display_top' => 1],
            ['prefecture' => '福岡県', 'name' => '八幡', 'api_id' => '400020', 'display_top' => 0],
            ['prefecture' => '福岡県', 'name' => '飯塚', 'api_id' => '400030', 'display_top' => 0],
            ['prefecture' => '福岡県', 'name' => '久留米', 'api_id' => '400040', 'display_top' => 0],
            ['prefecture' => '佐賀県', 'name' => '佐賀', 'api_id' => '410010', 'display_top' => 0],
            ['prefecture' => '佐賀県', 'name' => '伊万里', 'api_id' => '410020', 'display_top' => 0],
            ['prefecture' => '長崎県', 'name' => '長崎', 'api_id' => '420010', 'display_top' => 0],
            ['prefecture' => '長崎県', 'name' => '佐世保', 'api_id' => '420020', 'display_top' => 0],
            ['prefecture' => '長崎県', 'name' => '厳原', 'api_id' => '420030', 'display_top' => 0],
            ['prefecture' => '長崎県', 'name' => '福江', 'api_id' => '420040', 'display_top' => 0],
            ['prefecture' => '熊本県', 'name' => '熊本', 'api_id' => '430010', 'display_top' => 0],
            ['prefecture' => '熊本県', 'name' => '阿蘇乙姫', 'api_id' => '430020', 'display_top' => 0],
            ['prefecture' => '熊本県', 'name' => '牛深', 'api_id' => '430030', 'display_top' => 0],
            ['prefecture' => '熊本県', 'name' => '人吉', 'api_id' => '430040', 'display_top' => 0],
            ['prefecture' => '大分県', 'name' => '大分', 'api_id' => '440010', 'display_top' => 0],
            ['prefecture' => '大分県', 'name' => '中津', 'api_id' => '440020', 'display_top' => 0],
            ['prefecture' => '大分県', 'name' => '日田', 'api_id' => '440030', 'display_top' => 0],
            ['prefecture' => '大分県', 'name' => '佐伯', 'api_id' => '440040', 'display_top' => 0],
            ['prefecture' => '宮崎県', 'name' => '宮崎', 'api_id' => '450010', 'display_top' => 0],
            ['prefecture' => '宮崎県', 'name' => '延岡', 'api_id' => '450020', 'display_top' => 0],
            ['prefecture' => '宮崎県', 'name' => '都城', 'api_id' => '450030', 'display_top' => 0],
            ['prefecture' => '宮崎県', 'name' => '高千穂', 'api_id' => '450040', 'display_top' => 0],
            ['prefecture' => '鹿児島県', 'name' => '鹿児島', 'api_id' => '460010', 'display_top' => 0],
            ['prefecture' => '鹿児島県', 'name' => '鹿屋', 'api_id' => '460020', 'display_top' => 0],
            ['prefecture' => '鹿児島県', 'name' => '種子島', 'api_id' => '460030', 'display_top' => 0],
            ['prefecture' => '鹿児島県', 'name' => '名瀬', 'api_id' => '460040', 'display_top' => 0],
            ['prefecture' => '沖縄県', 'name' => '那覇', 'api_id' => '471010', 'display_top' => 0],
            ['prefecture' => '沖縄県', 'name' => '名護', 'api_id' => '471020', 'display_top' => 0],
            ['prefecture' => '沖縄県', 'name' => '久米島', 'api_id' => '471030', 'display_top' => 0],
            ['prefecture' => '沖縄県', 'name' => '南大東', 'api_id' => '472000', 'display_top' => 0],
            ['prefecture' => '沖縄県', 'name' => '宮古島', 'api_id' => '473000', 'display_top' => 0],
            ['prefecture' => '沖縄県', 'name' => '石垣島', 'api_id' => '474010', 'display_top' => 0],
            ['prefecture' => '沖縄県', 'name' => '与那国島', 'api_id' => '474020', 'display_top' => 0],
        ];


        // バッチ挿入で高速化
        Location::insert($locations);

        $this->command->info('Location data seeded successfully!');
    }
}
