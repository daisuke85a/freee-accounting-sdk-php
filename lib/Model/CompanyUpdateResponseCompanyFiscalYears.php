<?php
/**
 * CompanyUpdateResponseCompanyFiscalYears
 *
 * PHP version 7.2
 *
 * @category Class
 * @package  Freee\Accounting
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */

/**
 * freee API
 *
 * <h1 id=\"freee_api\">freee API</h1> <hr /> <h2 id=\"start_guide\">スタートガイド</h2>  <p>freee API開発がはじめての方は<a href=\"https://developer.freee.co.jp/getting-started\">freee API スタートガイド</a>を参照してください。</p>  <hr /> <h2 id=\"specification\">仕様</h2>  <pre><code>【重要】会計freee APIの新バージョンについて 2020年12月まで、2つのバージョンが利用できる状態です。古いものは2020年12月に利用不可となります。<br> 新しいAPIを利用するにはリクエストヘッダーに以下を指定します。 X-Api-Version: 2020-06-15<br> 指定がない場合は2020年12月に廃止予定のAPIを利用することとなります。<br> 【重要】APIのバージョン指定をせずに利用し続ける場合 2020年12月に新しいバージョンのAPIに自動的に切り替わります。 詳細は、<a href=\"https://developer.freee.co.jp/release-note/2948\" target=\"_blank\">リリースノート</a>をご覧ください。<br> 旧バージョンのAPIリファレンスを確認したい場合は、<a href=\"https://freee.github.io/freee-api-schema/\" target=\"_blank\">旧バージョンのAPIリファレンスページ</a>をご覧ください。 </code></pre>  <h3 id=\"api_endpoint\">APIエンドポイント</h3>  <p>https://api.freee.co.jp/ (httpsのみ)</p>  <h3 id=\"about_authorize\">認証について</h3> <p>OAuth2.0を利用します。詳細は<a href=\"https://developer.freee.co.jp/docs\" target=\"_blank\">ドキュメントの認証</a>パートを参照してください。</p>  <h3 id=\"data_format\">データフォーマット</h3>  <p>リクエスト、レスポンスともにJSON形式をサポートしていますが、詳細は、API毎の説明欄（application/jsonなど）を確認してください。</p>  <h3 id=\"compatibility\">後方互換性ありの変更</h3>  <p>freeeでは、APIを改善していくために以下のような変更は後方互換性ありとして通知なく変更を入れることがあります。アプリケーション実装者は以下を踏まえて開発を行ってください。</p>  <ul> <li>新しいAPIリソース・エンドポイントの追加</li> <li>既存のAPIに対して必須ではない新しいリクエストパラメータの追加</li> <li>既存のAPIレスポンスに対する新しいプロパティの追加</li> <li>既存のAPIレスポンスに対するプロパティの順番の入れ変え</li> <li>keyとなっているidやcodeの長さの変更（長くする）</li> </ul>  <h3 id=\"common_response_header\">共通レスポンスヘッダー</h3>  <p>すべてのAPIのレスポンスには以下のHTTPヘッダーが含まれます。</p>  <ul> <li> <p>X-Freee-Request-ID</p> <ul> <li>各リクエスト毎に発行されるID</li> </ul> </li> </ul>  <h3 id=\"common_error_response\">共通エラーレスポンス</h3>  <ul> <li> <p>ステータスコードはレスポンス内のJSONに含まれる他、HTTPヘッダにも含まれる</p> </li> <li> <p>一部のエラーレスポンスにはエラーコードが含まれます。<br>詳細は、<a href=\"https://developer.freee.co.jp/tips/faq/40x-checkpoint\">HTTPステータスコード400台エラー時のチェックポイント</a>を参照してください</p> </li> <p>type</p>  <ul> <li>status : HTTPステータスコードの説明</li>  <li>validation : エラーの詳細の説明（開発者向け）</li> </ul> </li> </ul>  <p>レスポンスの例</p>  <pre><code>  {     &quot;status_code&quot; : 400,     &quot;errors&quot; : [       {         &quot;type&quot; : &quot;status&quot;,         &quot;messages&quot; : [&quot;不正なリクエストです。&quot;]       },       {         &quot;type&quot; : &quot;validation&quot;,         &quot;messages&quot; : [&quot;Date は不正な日付フォーマットです。入力例：2013-01-01&quot;]       }     ]   }</code></pre>  </br>  <h3 id=\"api_rate_limit\">API使用制限</h3>    <p>freeeは一定期間に過度のアクセスを検知した場合、APIアクセスをコントロールする場合があります。</p>   <p>その際のhttp status codeは403となります。制限がかかってから10分程度が過ぎると再度使用することができるようになります。</p>  <h4 id=\"reports_api_endpoint\">/reportsエンドポイント</h4>  <p>freeeは/reportsエンドポイントに対して1秒間に10以上のアクセスを検知した場合、APIアクセスをコントロールする場合があります。その際のhttp status codeは429（too many requests）となります。</p>  <p>レスポンスボディのmetaプロパティに以下を含めます。</p>  <ul>   <li>設定されている上限値</li>   <li>上限に達するまでの使用可能回数</li>   <li>（上限値に達した場合）使用回数がリセットされる時刻</li> </ul>  <h3 id=\"plan_api_rate_limit\">プラン別のAPI Rate Limit</h3>   <table border=\"1\">     <tbody>       <tr>         <th style=\"padding: 10px\"><strong>会計freeeプラン名</strong></th>         <th style=\"padding: 10px\"><strong>事業所とアプリケーション毎に1日でのAPIコール数</strong></th>       </tr>       <tr>         <td style=\"padding: 10px\">エンタープライズ</td>         <td style=\"padding: 10px\">10,000</td>       </tr>       <tr>         <td style=\"padding: 10px\">プロフェッショナル</td>         <td style=\"padding: 10px\">5,000</td>       </tr>       <tr>         <td style=\"padding: 10px\">ベーシック</td>         <td style=\"padding: 10px\">3,000</td>       </tr>       <tr>         <td style=\"padding: 10px\">ミニマム</td>         <td style=\"padding: 10px\">3,000</td>       </tr>       <tr>         <td style=\"padding: 10px\">上記以外</td>         <td style=\"padding: 10px\">3,000</td>       </tr>     </tbody>   </table>  <h3 id=\"webhook\">Webhookについて</h3>  <p>詳細は<a href=\"https://developer.freee.co.jp/docs/accounting/webhook\" target=\"_blank\">会計Webhook概要</a>を参照してください。</p>  <hr /> <h2 id=\"contact\">連絡先</h2>  <p>ご不明点、ご要望等は <a href=\"https://support.freee.co.jp/hc/ja/requests/new\">freee サポートデスクへのお問い合わせフォーム</a> からご連絡ください。</p> <hr />&copy; Since 2013 freee K.K.
 *
 * The version of the OpenAPI document: v1.0
 * 
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 5.0.0
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace Freee\Accounting\Model;

use \ArrayAccess;
use \Freee\Accounting\ObjectSerializer;

/**
 * CompanyUpdateResponseCompanyFiscalYears Class Doc Comment
 *
 * @category Class
 * @package  Freee\Accounting
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<TKey, TValue>
 * @template TKey int|null
 * @template TValue mixed|null  
 */
class CompanyUpdateResponseCompanyFiscalYears implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'companyUpdateResponse_company_fiscal_years';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'accounting_period' => 'int',
        'depreciation_record_method' => 'int',
        'end_date' => 'string',
        'indirect_write_off_method' => 'bool',
        'indirect_write_off_method_type' => 'bool',
        'return_code' => 'int',
        'sales_tax_business_code' => 'int',
        'start_date' => 'string',
        'tax_account_method' => 'int',
        'tax_fraction' => 'int',
        'tax_method' => 'int',
        'use_industry_template' => 'bool'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'accounting_period' => null,
        'depreciation_record_method' => null,
        'end_date' => null,
        'indirect_write_off_method' => null,
        'indirect_write_off_method_type' => null,
        'return_code' => null,
        'sales_tax_business_code' => null,
        'start_date' => null,
        'tax_account_method' => null,
        'tax_fraction' => null,
        'tax_method' => null,
        'use_industry_template' => null
    ];

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function openAPITypes()
    {
        return self::$openAPITypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function openAPIFormats()
    {
        return self::$openAPIFormats;
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'accounting_period' => 'accounting_period',
        'depreciation_record_method' => 'depreciation_record_method',
        'end_date' => 'end_date',
        'indirect_write_off_method' => 'indirect_write_off_method',
        'indirect_write_off_method_type' => 'indirect_write_off_method_type',
        'return_code' => 'return_code',
        'sales_tax_business_code' => 'sales_tax_business_code',
        'start_date' => 'start_date',
        'tax_account_method' => 'tax_account_method',
        'tax_fraction' => 'tax_fraction',
        'tax_method' => 'tax_method',
        'use_industry_template' => 'use_industry_template'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'accounting_period' => 'setAccountingPeriod',
        'depreciation_record_method' => 'setDepreciationRecordMethod',
        'end_date' => 'setEndDate',
        'indirect_write_off_method' => 'setIndirectWriteOffMethod',
        'indirect_write_off_method_type' => 'setIndirectWriteOffMethodType',
        'return_code' => 'setReturnCode',
        'sales_tax_business_code' => 'setSalesTaxBusinessCode',
        'start_date' => 'setStartDate',
        'tax_account_method' => 'setTaxAccountMethod',
        'tax_fraction' => 'setTaxFraction',
        'tax_method' => 'setTaxMethod',
        'use_industry_template' => 'setUseIndustryTemplate'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'accounting_period' => 'getAccountingPeriod',
        'depreciation_record_method' => 'getDepreciationRecordMethod',
        'end_date' => 'getEndDate',
        'indirect_write_off_method' => 'getIndirectWriteOffMethod',
        'indirect_write_off_method_type' => 'getIndirectWriteOffMethodType',
        'return_code' => 'getReturnCode',
        'sales_tax_business_code' => 'getSalesTaxBusinessCode',
        'start_date' => 'getStartDate',
        'tax_account_method' => 'getTaxAccountMethod',
        'tax_fraction' => 'getTaxFraction',
        'tax_method' => 'getTaxMethod',
        'use_industry_template' => 'getUseIndustryTemplate'
    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return array
     */
    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    public static function getters()
    {
        return self::$getters;
    }

    /**
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName()
    {
        return self::$openAPIModelName;
    }

    

    

    /**
     * Associative array for storing property values
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     *
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->container['accounting_period'] = $data['accounting_period'] ?? null;
        $this->container['depreciation_record_method'] = $data['depreciation_record_method'] ?? null;
        $this->container['end_date'] = $data['end_date'] ?? null;
        $this->container['indirect_write_off_method'] = $data['indirect_write_off_method'] ?? null;
        $this->container['indirect_write_off_method_type'] = $data['indirect_write_off_method_type'] ?? null;
        $this->container['return_code'] = $data['return_code'] ?? null;
        $this->container['sales_tax_business_code'] = $data['sales_tax_business_code'] ?? null;
        $this->container['start_date'] = $data['start_date'] ?? null;
        $this->container['tax_account_method'] = $data['tax_account_method'] ?? null;
        $this->container['tax_fraction'] = $data['tax_fraction'] ?? null;
        $this->container['tax_method'] = $data['tax_method'] ?? null;
        $this->container['use_industry_template'] = $data['use_industry_template'] ?? null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['depreciation_record_method'] === null) {
            $invalidProperties[] = "'depreciation_record_method' can't be null";
        }
        if (($this->container['depreciation_record_method'] > 1)) {
            $invalidProperties[] = "invalid value for 'depreciation_record_method', must be smaller than or equal to 1.";
        }

        if (($this->container['depreciation_record_method'] < 0)) {
            $invalidProperties[] = "invalid value for 'depreciation_record_method', must be bigger than or equal to 0.";
        }

        if ($this->container['indirect_write_off_method'] === null) {
            $invalidProperties[] = "'indirect_write_off_method' can't be null";
        }
        if ($this->container['indirect_write_off_method_type'] === null) {
            $invalidProperties[] = "'indirect_write_off_method_type' can't be null";
        }
        if ($this->container['return_code'] === null) {
            $invalidProperties[] = "'return_code' can't be null";
        }
        if (($this->container['return_code'] > 3)) {
            $invalidProperties[] = "invalid value for 'return_code', must be smaller than or equal to 3.";
        }

        if (($this->container['return_code'] < 0)) {
            $invalidProperties[] = "invalid value for 'return_code', must be bigger than or equal to 0.";
        }

        if ($this->container['sales_tax_business_code'] === null) {
            $invalidProperties[] = "'sales_tax_business_code' can't be null";
        }
        if (($this->container['sales_tax_business_code'] > 5)) {
            $invalidProperties[] = "invalid value for 'sales_tax_business_code', must be smaller than or equal to 5.";
        }

        if (($this->container['sales_tax_business_code'] < 0)) {
            $invalidProperties[] = "invalid value for 'sales_tax_business_code', must be bigger than or equal to 0.";
        }

        if ($this->container['tax_account_method'] === null) {
            $invalidProperties[] = "'tax_account_method' can't be null";
        }
        if (($this->container['tax_account_method'] > 2)) {
            $invalidProperties[] = "invalid value for 'tax_account_method', must be smaller than or equal to 2.";
        }

        if (($this->container['tax_account_method'] < 0)) {
            $invalidProperties[] = "invalid value for 'tax_account_method', must be bigger than or equal to 0.";
        }

        if ($this->container['tax_fraction'] === null) {
            $invalidProperties[] = "'tax_fraction' can't be null";
        }
        if (($this->container['tax_fraction'] > 2)) {
            $invalidProperties[] = "invalid value for 'tax_fraction', must be smaller than or equal to 2.";
        }

        if (($this->container['tax_fraction'] < 0)) {
            $invalidProperties[] = "invalid value for 'tax_fraction', must be bigger than or equal to 0.";
        }

        if ($this->container['tax_method'] === null) {
            $invalidProperties[] = "'tax_method' can't be null";
        }
        if (($this->container['tax_method'] > 4)) {
            $invalidProperties[] = "invalid value for 'tax_method', must be smaller than or equal to 4.";
        }

        if (($this->container['tax_method'] < 0)) {
            $invalidProperties[] = "invalid value for 'tax_method', must be bigger than or equal to 0.";
        }

        if ($this->container['use_industry_template'] === null) {
            $invalidProperties[] = "'use_industry_template' can't be null";
        }
        return $invalidProperties;
    }

    /**
     * Validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {
        return count($this->listInvalidProperties()) === 0;
    }


    /**
     * Gets accounting_period
     *
     * @return int|null
     */
    public function getAccountingPeriod()
    {
        return $this->container['accounting_period'];
    }

    /**
     * Sets accounting_period
     *
     * @param int|null $accounting_period 期
     *
     * @return self
     */
    public function setAccountingPeriod($accounting_period)
    {
        $this->container['accounting_period'] = $accounting_period;

        return $this;
    }

    /**
     * Gets depreciation_record_method
     *
     * @return int
     */
    public function getDepreciationRecordMethod()
    {
        return $this->container['depreciation_record_method'];
    }

    /**
     * Sets depreciation_record_method
     *
     * @param int $depreciation_record_method 月次償却（0: しない、1: する）
     *
     * @return self
     */
    public function setDepreciationRecordMethod($depreciation_record_method)
    {

        if (($depreciation_record_method > 1)) {
            throw new \InvalidArgumentException('invalid value for $depreciation_record_method when calling CompanyUpdateResponseCompanyFiscalYears., must be smaller than or equal to 1.');
        }
        if (($depreciation_record_method < 0)) {
            throw new \InvalidArgumentException('invalid value for $depreciation_record_method when calling CompanyUpdateResponseCompanyFiscalYears., must be bigger than or equal to 0.');
        }

        $this->container['depreciation_record_method'] = $depreciation_record_method;

        return $this;
    }

    /**
     * Gets end_date
     *
     * @return string|null
     */
    public function getEndDate()
    {
        return $this->container['end_date'];
    }

    /**
     * Sets end_date
     *
     * @param string|null $end_date 期末日
     *
     * @return self
     */
    public function setEndDate($end_date)
    {
        $this->container['end_date'] = $end_date;

        return $this;
    }

    /**
     * Gets indirect_write_off_method
     *
     * @return bool
     */
    public function getIndirectWriteOffMethod()
    {
        return $this->container['indirect_write_off_method'];
    }

    /**
     * Sets indirect_write_off_method
     *
     * @param bool $indirect_write_off_method 固定資産の控除法（true: 間接控除法、false: 直接控除法）
     *
     * @return self
     */
    public function setIndirectWriteOffMethod($indirect_write_off_method)
    {
        $this->container['indirect_write_off_method'] = $indirect_write_off_method;

        return $this;
    }

    /**
     * Gets indirect_write_off_method_type
     *
     * @return bool
     */
    public function getIndirectWriteOffMethodType()
    {
        return $this->container['indirect_write_off_method_type'];
    }

    /**
     * Sets indirect_write_off_method_type
     *
     * @param bool $indirect_write_off_method_type 間接控除時の累計額（true: 資産分類別、false: 共通）
     *
     * @return self
     */
    public function setIndirectWriteOffMethodType($indirect_write_off_method_type)
    {
        $this->container['indirect_write_off_method_type'] = $indirect_write_off_method_type;

        return $this;
    }

    /**
     * Gets return_code
     *
     * @return int
     */
    public function getReturnCode()
    {
        return $this->container['return_code'];
    }

    /**
     * Sets return_code
     *
     * @param int $return_code 不動産所得使用区分（0: 一般、3: 一般/不動産） ※個人事業主のみ設定可能
     *
     * @return self
     */
    public function setReturnCode($return_code)
    {

        if (($return_code > 3)) {
            throw new \InvalidArgumentException('invalid value for $return_code when calling CompanyUpdateResponseCompanyFiscalYears., must be smaller than or equal to 3.');
        }
        if (($return_code < 0)) {
            throw new \InvalidArgumentException('invalid value for $return_code when calling CompanyUpdateResponseCompanyFiscalYears., must be bigger than or equal to 0.');
        }

        $this->container['return_code'] = $return_code;

        return $this;
    }

    /**
     * Gets sales_tax_business_code
     *
     * @return int
     */
    public function getSalesTaxBusinessCode()
    {
        return $this->container['sales_tax_business_code'];
    }

    /**
     * Sets sales_tax_business_code
     *
     * @param int $sales_tax_business_code 簡易課税用事業区分（0: 第一種：卸売業、1: 第二種：小売業、2: 第三種：農林水産業、工業、建設業、製造業など、3: 第四種：飲食店業など、4: 第五種：金融・保険業、運輸通信業、サービス業など、5: 第六種：不動産業など
     *
     * @return self
     */
    public function setSalesTaxBusinessCode($sales_tax_business_code)
    {

        if (($sales_tax_business_code > 5)) {
            throw new \InvalidArgumentException('invalid value for $sales_tax_business_code when calling CompanyUpdateResponseCompanyFiscalYears., must be smaller than or equal to 5.');
        }
        if (($sales_tax_business_code < 0)) {
            throw new \InvalidArgumentException('invalid value for $sales_tax_business_code when calling CompanyUpdateResponseCompanyFiscalYears., must be bigger than or equal to 0.');
        }

        $this->container['sales_tax_business_code'] = $sales_tax_business_code;

        return $this;
    }

    /**
     * Gets start_date
     *
     * @return string|null
     */
    public function getStartDate()
    {
        return $this->container['start_date'];
    }

    /**
     * Sets start_date
     *
     * @param string|null $start_date 期首日
     *
     * @return self
     */
    public function setStartDate($start_date)
    {
        $this->container['start_date'] = $start_date;

        return $this;
    }

    /**
     * Gets tax_account_method
     *
     * @return int
     */
    public function getTaxAccountMethod()
    {
        return $this->container['tax_account_method'];
    }

    /**
     * Sets tax_account_method
     *
     * @param int $tax_account_method 消費税経理処理方法（0: 税込経理、1: 旧税抜経理、2: 税抜経理）
     *
     * @return self
     */
    public function setTaxAccountMethod($tax_account_method)
    {

        if (($tax_account_method > 2)) {
            throw new \InvalidArgumentException('invalid value for $tax_account_method when calling CompanyUpdateResponseCompanyFiscalYears., must be smaller than or equal to 2.');
        }
        if (($tax_account_method < 0)) {
            throw new \InvalidArgumentException('invalid value for $tax_account_method when calling CompanyUpdateResponseCompanyFiscalYears., must be bigger than or equal to 0.');
        }

        $this->container['tax_account_method'] = $tax_account_method;

        return $this;
    }

    /**
     * Gets tax_fraction
     *
     * @return int
     */
    public function getTaxFraction()
    {
        return $this->container['tax_fraction'];
    }

    /**
     * Sets tax_fraction
     *
     * @param int $tax_fraction 消費税端数処理方法（0: 切り捨て、1: 切り上げ、2: 四捨五入）
     *
     * @return self
     */
    public function setTaxFraction($tax_fraction)
    {

        if (($tax_fraction > 2)) {
            throw new \InvalidArgumentException('invalid value for $tax_fraction when calling CompanyUpdateResponseCompanyFiscalYears., must be smaller than or equal to 2.');
        }
        if (($tax_fraction < 0)) {
            throw new \InvalidArgumentException('invalid value for $tax_fraction when calling CompanyUpdateResponseCompanyFiscalYears., must be bigger than or equal to 0.');
        }

        $this->container['tax_fraction'] = $tax_fraction;

        return $this;
    }

    /**
     * Gets tax_method
     *
     * @return int
     */
    public function getTaxMethod()
    {
        return $this->container['tax_method'];
    }

    /**
     * Sets tax_method
     *
     * @param int $tax_method 課税区分（0: 免税、1: 簡易課税、2: 本則課税（個別対応方式）、3: 本則課税（一括比例配分方式）、4: 本則課税（全額控除））
     *
     * @return self
     */
    public function setTaxMethod($tax_method)
    {

        if (($tax_method > 4)) {
            throw new \InvalidArgumentException('invalid value for $tax_method when calling CompanyUpdateResponseCompanyFiscalYears., must be smaller than or equal to 4.');
        }
        if (($tax_method < 0)) {
            throw new \InvalidArgumentException('invalid value for $tax_method when calling CompanyUpdateResponseCompanyFiscalYears., must be bigger than or equal to 0.');
        }

        $this->container['tax_method'] = $tax_method;

        return $this;
    }

    /**
     * Gets use_industry_template
     *
     * @return bool
     */
    public function getUseIndustryTemplate()
    {
        return $this->container['use_industry_template'];
    }

    /**
     * Sets use_industry_template
     *
     * @param bool $use_industry_template 製造業向け機能（true: 使用する、false: 使用しない）
     *
     * @return self
     */
    public function setUseIndustryTemplate($use_industry_template)
    {
        $this->container['use_industry_template'] = $use_industry_template;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param integer $offset Offset
     *
     * @return mixed|null
     */
    public function offsetGet($offset)
    {
        return $this->container[$offset] ?? null;
    }

    /**
     * Sets value based on offset.
     *
     * @param int|null $offset Offset
     * @param mixed    $value  Value to be set
     *
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     *
     * @param integer $offset Offset
     *
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }

    /**
     * Serializes the object to a value that can be serialized natively by json_encode().
     * @link https://www.php.net/manual/en/jsonserializable.jsonserialize.php
     *
     * @return mixed Returns data which can be serialized by json_encode(), which is a value
     * of any type other than a resource.
     */
    public function jsonSerialize()
    {
       return ObjectSerializer::sanitizeForSerialization($this);
    }

    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString()
    {
        return json_encode(
            ObjectSerializer::sanitizeForSerialization($this),
            JSON_PRETTY_PRINT
        );
    }

    /**
     * Gets a header-safe presentation of the object
     *
     * @return string
     */
    public function toHeaderValue()
    {
        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}


