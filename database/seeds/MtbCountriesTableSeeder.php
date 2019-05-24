<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MtbCountriesTableSeeder extends Seeder
{

    private $countries = array(
        "日本" => array(
            "東京" => array(
                array(
                    "airport_name" => "成田",
                    "airport_code" => "NRT",
                ),
                array(
                    "airport_name" => "羽田",
                    "airport_code" => "HND",
                ),
            ),
            "大阪" => array(
                array(
                    "airport_name" => "関西",
                    "airport_code" => "KIX",
                ),
                array(
                    "airport_name" => "伊丹",
                    "airport_code" => "ITM",
                ),
            ),
            "名古屋" => array(
                array(
                    "airport_name" => "中部",
                    "airport_code" => "NGO",
                ),
                array(
                    "airport_name" => "小牧",
                    "airport_code" => "NKM",
                ),
            ),
            "札幌" => array(
                array(
                    "airport_name" => "新千歳",
                    "airport_code" => "CTS",
                ),
                array(
                    "airport_name" => "丘珠",
                    "airport_code" => "OKD",
                ),
            ),
            "旭川" =>array(
                array(
                    "airport_name" => "旭川",
                    "airport_code" => "AKJ",
                ),
            ),
            "帯広" => array(
                array(
                    "airport_name" => "帯広",
                    "airport_code" => "OBO",
                ),
            ),
            "女满别" => array(
                array(
                    "airport_name" => "女満別",
                    "airport_code" => "MMB",
                ),
            ),
            "釧路" => array(
                array(
                    "airport_name" => "釧路",
                    "airport_code" => "KUH",
                ),
            ),
            "函館" => array(
                array(
                    "airport_name" => "函館",
                    "airport_code" => "HKD",
                ),
            ),
            "青森" => array(
                array(
                    "airport_name" => "青森",
                    "airport_code" => "AOJ",
                ),
            ),
            "花巻" => array(
                array(
                    "airport_name" => "花巻",
                    "airport_code" => "HNA",
                ),
            ),
            "仙台" => array(
                array(
                    "airport_name" => "仙台",
                    "airport_code" => "SDJ",
                ),
            ),
            "山形" => array(
                array(
                    "airport_name" => "山形",
                    "airport_code" => "GAJ",
                ),
            ),
            "福島" => array(
                array(
                    "airport_name" => "福島",
                    "airport_code" => "FKS",
                ),
            ),
            "茨城" => array(
                array(
                    "airport_name" => "茨城",
                    "airport_code" => "IBR",
                ),
            ),
            "新潟" => array(
                array(
                    "airport_name" => "新潟",
                    "airport_code" => "KIJ",
                ),
            ),
            "富山" => array(
                array(
                    "airport_name" => "富山",
                    "airport_code" => "TOY",
                ),
            ),
            "小松" => array(
                array(
                    "airport_name" => "小松",
                    "airport_code" => "KMQ",
                ),
            ),
            "松本" => array(
                array(
                    "airport_name" => "松本",
                    "airport_code" => "MMJ",
                ),
            ),
            "静岡" => array(
                array(
                    "airport_name" => "静岡",
                    "airport_code" => "FSZ",
                ),
            ),
            "米子" => array(
                array(
                    "airport_name" => "米子",
                    "airport_code" => "YGJ",
                ),
            ),
            "出雲" => array(
                array(
                    "airport_name" => "出雲",
                    "airport_code" => "IZO",
                ),
            ),
            "岡山" => array(
                array(
                    "airport_name" => "岡山",
                    "airport_code" => "OKJ",
                ),
            ),
            "広島" => array(
                array(
                    "airport_name" => "広島",
                    "airport_code" => "HIJ",
                ),
            ),
            "山口宇部" => array(
                array(
                    "airport_name" => "山口宇部",
                    "airport_code" => "UBJ",
                ),
            ),
            "高松" => array(
                array(
                    "airport_name" => "高松",
                    "airport_code" => "TAK",
                ),
            ),
            "松山" => array(
                array(
                    "airport_name" => "松山",
                    "airport_code" => "MYJ",
                ),
            ),
            "高知" => array(
                array(
                    "airport_name" => "高知",
                    "airport_code" => "KCZ",
                ),
            ),
            "福岡" => array(
                array(
                    "airport_name" => "福岡",
                    "airport_code" => "FUK",
                ),
            ),
            "北九州" => array(
                array(
                    "airport_name" => "北九州",
                    "airport_code" => "KKJ",
                ),
            ),
            "佐賀" => array(
                array(
                    "airport_name" => "佐賀",
                    "airport_code" => "HSG",
                ),
            ),
            "長崎" => array(
                array(
                    "airport_name" => "長崎",
                    "airport_code" => "NGS",
                ),
            ),
            "熊本" => array(
                array(
                    "airport_name" => "熊本",
                    "airport_code" => "KMJ",
                ),
            ),
            "大分" => array(
                array(
                    "airport_name" => "大分",
                    "airport_code" => "OIT",
                ),
            ),
            "宮崎" => array(
                array(
                    "airport_name" => "宮崎",
                    "airport_code" => "KMI",
                ),
            ),
            "鹿児島" => array(
                array(
                    "airport_name" => "鹿児島",
                    "airport_code" => "KOJ",
                ),
            ),
            "沖縄" => array(
                array(
                    "airport_name" => "沖縄",
                    "airport_code" => "OKA",
                ),
            ),
            "奄美" => array(
                array(
                    "airport_name" => "奄美",
                    "airport_code" => "ASJ",
                ),
            ),
            "石垣" => array(
                array(
                    "airport_name" => "石垣",
                    "airport_code" => "ISG",
                ),
            ),
            "宮古" => array(
                array(
                    "airport_name" => "宮古",
                    "airport_code" => "MMY",
                ),
                array(
                    "airport_name" => "宮古(下地島)",
                    "airport_code" => "SHI",
                ),
            )
        ),
        "台湾" => array(
            "台北" => array(
                array(
                    "airport_name" => "桃園",
                    "airport_code" => "TPE",
                ),
                array(
                    "airport_name" => "松山",
                    "airport_code" => "TSA",
                ),
            ),
            "台中" => array(
                array(
                    "airport_name" => "台中",
                    "airport_code" => "RMQ",
                ),
            ),
            "高雄" => array(
                array(
                    "airport_name" => "高雄",
                    "airport_code" => "KHH",
                ),
            ),
            "花蓮" => array(
                array(
                    "airport_name" => "花蓮",
                    "airport_code" => "HUN",
                ),
            )
        ),
        "中国" => array(
            "香港" => array(
                array(
                    "airport_name" => "香港",
                    "airport_code" => "HKG",
                ),
            ),
            "マカオ" => array(
                array(
                    "airport_name" => "マカオ",
                    "airport_code" => "MFM",
                ),
            ),
            "上海" => array(
                array(
                    "airport_name" => "上海(浦東)",
                    "airport_code" => "PVG",
                ),
                array(
                    "airport_name" => "上海(虹橋)",
                    "airport_code" => "SHA",
                )
            ),
            "北京" => array(
                array(
                    "airport_name" => "北京",
                    "airport_code" => "PEK",
                ),
            ),
            "深圳" => array(
                array(
                    "airport_name" => "深圳",
                    "airport_code" => "SZX",
                ),
            ),
            "泉州" => array(
                array(
                    "airport_name" => "泉州",
                    "airport_code" => "JJN",
                ),
            ),
            "成都" => array(
                array(
                    "airport_name" => "成都",
                    "airport_code" => "CTU",
                ),
            ),
            "広州" => array(
                array(
                    "airport_name" => "広州",
                    "airport_code" => "CAN",
                ),
            ),
            "廈門" => array(
                array(
                    "airport_name" => "廈門",
                    "airport_code" => "XMN",
                ),
            ),
            "合肥" => array(
                array(
                    "airport_name" => "合肥",
                    "airport_code" => "HFE",
                ),
            ),
            "フフホト" => array(
                array(
                    "airport_name" => "フフホト",
                    "airport_code" => "HET",
                ),
            ),
            "石家荘" => array(
                array(
                    "airport_name" => "石家荘",
                    "airport_code" => "SJW",
                ),
            ),
            "寧波" => array(
                array(
                    "airport_name" => "寧波",
                    "airport_code" => "NGB",
                ),
            ),
            "鄭州" => array(
                array(
                    "airport_name" => "鄭州",
                    "airport_code" => "CGO",
                ),
            ),
            "長春" => array(
                array(
                    "airport_name" => "長春",
                    "airport_code" => "CGQ",
                ),
            ),
            "蘭州" => array(
                array(
                    "airport_name" => "蘭州",
                    "airport_code" => "ZGC",
                ),
            ),
            "銀川" => array(
                array(
                    "airport_name" => "銀川",
                    "airport_code" => "INC",
                ),
            ),
            "南京" => array(
                array(
                    "airport_name" => "南京",
                    "airport_code" => "NKG",
                ),
            ),
            "貴陽" => array(
                array(
                    "airport_name" => "貴陽",
                    "airport_code" => "KWE",
                ),
            ),
            "常州" => array(
                array(
                    "airport_name" => "常州",
                    "airport_code" => "CZX",
                ),
            ),
            "海口" => array(
                array(
                    "airport_name" => "海口",
                    "airport_code" => "HAK",
                ),
            ),
            "瀋陽" => array(
                array(
                    "airport_name" => "瀋陽",
                    "airport_code" => "SHE",
                ),
            ),
            "青島" => array(
                array(
                    "airport_name" => "青島",
                    "airport_code" => "TAO",
                ),
            ),
            "済南" => array(
                array(
                    "airport_name" => "済南",
                    "airport_code" => "TNA",
                ),
            ),
            "麗江" => array(
                array(
                    "airport_name" => "麗江",
                    "airport_code" => "LJG",
                ),
            ),
            "西安" => array(
                array(
                    "airport_name" => "西安",
                    "airport_code" => "XIY",
                ),
            ),
            "昆明" => array(
                array(
                    "airport_name" => "昆明",
                    "airport_code" => "KMG",
                ),
            ),
            "哈爾濱" => array(
                array(
                    "airport_name" => "哈爾濱",
                    "airport_code" => "HRB",
                ),
            ),
            "揚州" => array(
                array(
                    "airport_name" => "揚州",
                    "airport_code" => "YTY",
                ),
            ),
            "大連" => array(
                array(
                    "airport_name" => "大連",
                    "airport_code" => "DLC",
                ),
            ),
            "重慶" => array(
                array(
                    "airport_name" => "重慶",
                    "airport_code" => "CKG",
                ),
            ),
            "天津" => array(
                array(
                    "airport_name" => "天津",
                    "airport_code" => "TSN",
                ),
            ),
            "武漢" => array(
                array(
                    "airport_name" => "武漢",
                    "airport_code" => "WUH",
                ),
            ),
            "長沙" => array(
                array(
                    "airport_name" => "長沙",
                    "airport_code" => "CSX",
                ),
            )
        ),
        "韓国" => array(
            "ソウル" => array(
                array(
                    "airport_name" => "ソウル(仁川)",
                    "airport_code" => "ICN",
                ),
                array(
                    "airport_name" => "ソウル(金浦)",
                    "airport_code" => "GMP",
                ),
            ),
            "釜山" => array(
                array(
                    "airport_name" => "釜山",
                    "airport_code" => "PUS",
                ),
            ),
            "清州" => array(
                array(
                    "airport_name" => "清州",
                    "airport_code" => "CJJ",
                ),
            ),
            "大邱" => array(
                array(
                    "airport_name" => "大邱",
                    "airport_code" => "TAE",
                ),
            ),
            "済州" => array(
                array(
                    "airport_name" => "済州",
                    "airport_code" => "CJU",
                ),
            ),
            "務安" => array(
                array(
                    "airport_name" => "務安",
                    "airport_code" => "MWX",
                ),
            )
        ),
        "マレーシア" => array(
            "クアラルンプール" => array(
                array(
                    "airport_name" => "クアラルンプール",
                    "airport_code" => "KUL",
                ),
            ),
            "ペナン" => array(
                array(
                    "airport_name" => "ペナン",
                    "airport_code" => "PEN",
                ),
            ),
            "ランカウイ" => array(
                array(
                    "airport_name" => "ランカウイ",
                    "airport_code" => "LGK",
                ),
            ),
            "コタキナバル" => array(
                array(
                    "airport_name" => "コタキナバル",
                    "airport_code" => "BKI",
                ),
            )
        ),
        "シンガポール" => array(
            "シンガポール" => array(
                array(
                    "airport_name" => "シンガポール",
                    "airport_code" => "SIN",
                ),
            )
        ),
        "ベトナム" => array(
            "ハノイ" => array(
                array(
                    "airport_name" => "ハノイ",
                    "airport_code" => "HAN",
                ),
            ),
            "ホーチミン" => array(
                array(
                    "airport_name" => "ホーチミン",
                    "airport_code" => "SGN",
                ),
            ),
            "プーカット" => array(
                array(
                    "airport_name" => "プーカット",
                    "airport_code" => "UIH",
                ),
            ),
            "ニャチャン" => array(
                array(
                    "airport_name" => "ニャチャン",
                    "airport_code" => "NHA",
                ),
            ),
            "ドンホイ" => array(
                array(
                    "airport_name" => "ドンホイ",
                    "airport_code" => "VDH",
                ),
            ),
            "ビン" => array(
                array(
                    "airport_name" => "ビン",
                    "airport_code" => "VII",
                ),
            ),
            "カントー" => array(
                array(
                    "airport_name" => "カントー",
                    "airport_code" => "VCA",
                ),
            ),
            "タインホア" => array(
                array(
                    "airport_name" => "タインホア",
                    "airport_code" => "THD",
                ),
            ),
            "フーコック" => array(
                array(
                    "airport_name" => "フーコック",
                    "airport_code" => "PQC",
                ),
            ),
            "カットビ" => array(
                array(
                    "airport_name" => "カットビ",
                    "airport_code" => "HPH",
                ),
            ),
            "ダナン" => array(
                array(
                    "airport_name" => "ダナン",
                    "airport_code" => "DAD",
                ),
            ),
            "カムラン" => array(
                array(
                    "airport_name" => "カムラン",
                    "airport_code" => "CXR",
                ),
            ),
            "バンメトート" => array(
                array(
                    "airport_name" => "バンメトート",
                    "airport_code" => "BMV",
                ),
            ),
            "リエンケオン" => array(
                array(
                    "airport_name" => "リエンケオン",
                    "airport_code" => "DLI",
                ),
            ),
            "フバイ" => array(
                array(
                    "airport_name" => "フバイ",
                    "airport_code" => "HUI",
                ),
            )
        ),
        "タイ" => array(
            "バンコク" => array(
                array(
                    "airport_name" => "バンコク(スワンナプーム)",
                    "airport_code" => "BKK",
                ),
                array(
                    "airport_name" => "バンコク(ドンムアン)",
                    "airport_code" => "DMK",
                )
            ),
            "チェンライ" => array(
                array(
                    "airport_name" => "チェンライ",
                    "airport_code" => "CEI",
                ),
            ),
            "ハートヤイ" => array(
                array(
                    "airport_name" => "ハートヤイ",
                    "airport_code" => "HDY",
                ),
            ),
            "ウドーンターニー" => array(
                array(
                    "airport_name" => "ウドーンターニー",
                    "airport_code" => "UTH",
                ),
            ),
            "クラビー" => array(
                array(
                    "airport_name" => "クラビー",
                    "airport_code" => "KBV",
                ),
            ),
            "プーケット" => array(
                array(
                    "airport_name" => "プーケット",
                    "airport_code" => "HKT",
                ),
            ),
            "チェンマイ" => array(
                array(
                    "airport_name" => "チェンマイ",
                    "airport_code" => "CNX",
                ),
            ),
            "ウボンラーチャターニー" => array(
                array(
                    "airport_name" => "ウボンラーチャターニー",
                    "airport_code" => "UBP",
                ),
            )
        ),
        "フィリピン" => array(
            "マニラ" => array(
                array(
                    "airport_name" => "マニラ",
                    "airport_code" => "MNL",
                ),
            ),
            "セブ" => array(
                array(
                    "airport_name" => "セブ",
                    "airport_code" => "CEB",
                ),
            ),
            "カリボ" => array(
                array(
                    "airport_name" => "カリボ",
                    "airport_code" => "KLO",
                ),
            ),
            "クラーク" => array(
                array(
                    "airport_name" => "クラーク",
                    "airport_code" => "CRK",
                ),
            )
        ),
        "オーストラリア" => array(
            "メルボルン" => array(
                array(
                    "airport_name" => "メルボルン",
                    "airport_code" => "MEL",
                ),
            ),
            "シドニー" => array(
                array(
                    "airport_name" => "シドニー",
                    "airport_code" => "SYD",
                ),
            ),
            "ゴールドコースト" => array(
                array(
                    "airport_name" => "ゴールドコースト",
                    "airport_code" => "OOL",
                ),
            ),
            "ケアンズ" => array(
                array(
                    "airport_name" => "ケアンズ",
                    "airport_code" => "CNS",
                ),
            ),
            "パース" => array(
                array(
                    "airport_name" => "パース",
                    "airport_code" => "PER",
                ),
            ),
            "ブリスベン" => array(
                array(
                    "airport_name" => "ブリスベン",
                    "airport_code" => "BNE",
                ),
            ),
            "コフス・ハーバー" => array(
                array(
                    "airport_name" => "コフス・ハーバー",
                    "airport_code" => "CFS",
                ),
            ),
            "ウィッツサンデー・コースト" => array(
                array(
                    "airport_name" => "ウィッツサンデー・コースト",
                    "airport_code" => "PPP",
                ),
            ),
            "ホバート" => array(
                array(
                    "airport_name" => "ホバート",
                    "airport_code" => "HBA",
                ),
            ),
            "アデレード" => array(
                array(
                    "airport_name" => "アデレード",
                    "airport_code" => "ADL",
                ),
            ),
            "ダーウィン" => array(
                array(
                    "airport_name" => "ダーウィン",
                    "airport_code" => "DRW",
                ),
            ),
            "マッカイ" => array(
                array(
                    "airport_name" => "マッカイ",
                    "airport_code" => "MKY",
                ),
            )
        ),
        "インドネシア" => array(
            "デンパサール" => array(
                array(
                    "airport_name" => "デンパサール",
                    "airport_code" => "DPS",
                ),
            ),
            "ジャカルタ" => array(
                array(
                    "airport_name" => "ジャカルタ",
                    "airport_code" => "CGK",
                ),
            ),
            "フセイン・サストラネガラ" => array(
                array(
                    "airport_name" => "フセイン・サストラネガラ",
                    "airport_code" => "BDO",
                ),
            ),
            "ジュアンダ" => array(
                array(
                    "airport_name" => "ジュアンダ",
                    "airport_code" => "SUB",
                ),
            )
        ),
        "アメリカ" => array(
            "ホノルル" => array(
                array(
                    "airport_name" => "ホノルル",
                    "airport_code" => "HNL",
                ),
            )
        ),
        "ミャンマー" => array(
            "ヤンゴン" => array(
                array(
                    "airport_name" => "ヤンゴン",
                    "airport_code" => "RGN",
                ),
            )
        ),
        "カンボジア" => array(
            "プノンペン" => array(
                array(
                    "airport_name" => "プノンペン",
                    "airport_code" => "PNH",
                ),
            ),
            "シェムリアップ" => array(
                array(
                    "airport_name" => "シェムリアップ",
                    "airport_code" => "REP",
                ),
            )
        ),
        "ブルネイ" => array(
            "ブルネイ" => array(
                array(
                    "airport_name" => "ブルネイ",
                    "airport_code" => "BWN",
                ),
            )
        ),
        "バングラデシュ" => array(
            "シャージャラル" => array(
                array(
                    "airport_name" => "シャージャラル",
                    "airport_code" => "DAC",
                ),
            )
        ),
        "インド" => array(
            "ケンペゴウダ" => array(
                array(
                    "airport_name" => "ケンペゴウダ",
                    "airport_code" => "BLR",
                ),
            ),
            "ティルチラパリ" => array(
                array(
                    "airport_name" => "ティルチラパリ",
                    "airport_code" => "TRZ",
                ),
            ),
            "コチン" => array(
                array(
                    "airport_name" => "コチン",
                    "airport_code" => "COK",
                ),
            ),
            "ハイデラバード" => array(
                array(
                    "airport_name" => "ハイデラバード",
                    "airport_code" => "HYD",
                ),
            ),
            "チェンナイ" => array(
                array(
                    "airport_name" => "チェンナイ",
                    "airport_code" => "MAA",
                ),
            )
        ),
        "ミクロネシア" => array(
            "グアム" => array(
                array(
                    "airport_name" => "グアム",
                    "airport_code" => "GUM",
                ),
            )
        ),
        "ロシア" => array(
            "ウラジオストク" => array(
                array(
                    "airport_name" => "ウラジオストク",
                    "airport_code" => "VVO",
                ),
            )
        )
    );


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mtb_airports')->delete();
        DB::table('mtb_cities')->delete();
        DB::table('mtb_countries')->delete();

        $country_id = 1;
        $city_id = 1;
        $airport_id = 1;

        foreach ($this->countries as $country_name => $cities) {

            DB::table("mtb_countries")->insert([
                "id" => $country_id,
                "value" => $country_name,
                "rank" => $country_id,
            ]);


            foreach ($cities as $city_name => $airports) {
                DB::table("mtb_cities")->insert([
                    "id" => $city_id,
                    "value" => $city_name,
                    "rank" => $city_id,
                    "mtb_country_id" => $country_id
                ]);


                foreach ($airports as $airport) {

                    DB::table("mtb_airports")->insert([
                        "id" => $airport_id,
                        "airport_name" => $airport["airport_name"],
                        "airport_code" => $airport["airport_code"],
                        "mtb_city_id" => $city_id
                    ]);

                    $airport_id++;

                }

                $city_id++;

            }

            $country_id++;

        }
    }
}
