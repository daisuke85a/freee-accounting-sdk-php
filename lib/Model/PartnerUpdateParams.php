<?php
/**
 * PartnerUpdateParams
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
 * OpenAPI Generator version: 5.1.0
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
 * PartnerUpdateParams Class Doc Comment
 *
 * @category Class
 * @package  Freee\Accounting
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<TKey, TValue>
 * @template TKey int|null
 * @template TValue mixed|null  
 */
class PartnerUpdateParams implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'partnerUpdateParams';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'address_attributes' => '\Freee\Accounting\Model\PartnerCreateParamsAddressAttributes',
        'company_id' => 'int',
        'contact_name' => 'string',
        'country_code' => 'string',
        'default_title' => 'string',
        'email' => 'string',
        'invoice_payment_term_attributes' => '\Freee\Accounting\Model\PartnerCreateParamsInvoicePaymentTermAttributes',
        'long_name' => 'string',
        'name' => 'string',
        'name_kana' => 'string',
        'org_code' => 'int',
        'partner_bank_account_attributes' => '\Freee\Accounting\Model\PartnerCreateParamsPartnerBankAccountAttributes',
        'partner_doc_setting_attributes' => '\Freee\Accounting\Model\PartnerCreateParamsPartnerDocSettingAttributes',
        'payer_walletable_id' => 'int',
        'payment_term_attributes' => '\Freee\Accounting\Model\PartnerCreateParamsInvoicePaymentTermAttributes',
        'phone' => 'string',
        'shortcut1' => 'string',
        'shortcut2' => 'string',
        'transfer_fee_handling_side' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'address_attributes' => null,
        'company_id' => null,
        'contact_name' => null,
        'country_code' => null,
        'default_title' => null,
        'email' => null,
        'invoice_payment_term_attributes' => null,
        'long_name' => null,
        'name' => null,
        'name_kana' => null,
        'org_code' => null,
        'partner_bank_account_attributes' => null,
        'partner_doc_setting_attributes' => null,
        'payer_walletable_id' => null,
        'payment_term_attributes' => null,
        'phone' => null,
        'shortcut1' => null,
        'shortcut2' => null,
        'transfer_fee_handling_side' => null
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
        'address_attributes' => 'address_attributes',
        'company_id' => 'company_id',
        'contact_name' => 'contact_name',
        'country_code' => 'country_code',
        'default_title' => 'default_title',
        'email' => 'email',
        'invoice_payment_term_attributes' => 'invoice_payment_term_attributes',
        'long_name' => 'long_name',
        'name' => 'name',
        'name_kana' => 'name_kana',
        'org_code' => 'org_code',
        'partner_bank_account_attributes' => 'partner_bank_account_attributes',
        'partner_doc_setting_attributes' => 'partner_doc_setting_attributes',
        'payer_walletable_id' => 'payer_walletable_id',
        'payment_term_attributes' => 'payment_term_attributes',
        'phone' => 'phone',
        'shortcut1' => 'shortcut1',
        'shortcut2' => 'shortcut2',
        'transfer_fee_handling_side' => 'transfer_fee_handling_side'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'address_attributes' => 'setAddressAttributes',
        'company_id' => 'setCompanyId',
        'contact_name' => 'setContactName',
        'country_code' => 'setCountryCode',
        'default_title' => 'setDefaultTitle',
        'email' => 'setEmail',
        'invoice_payment_term_attributes' => 'setInvoicePaymentTermAttributes',
        'long_name' => 'setLongName',
        'name' => 'setName',
        'name_kana' => 'setNameKana',
        'org_code' => 'setOrgCode',
        'partner_bank_account_attributes' => 'setPartnerBankAccountAttributes',
        'partner_doc_setting_attributes' => 'setPartnerDocSettingAttributes',
        'payer_walletable_id' => 'setPayerWalletableId',
        'payment_term_attributes' => 'setPaymentTermAttributes',
        'phone' => 'setPhone',
        'shortcut1' => 'setShortcut1',
        'shortcut2' => 'setShortcut2',
        'transfer_fee_handling_side' => 'setTransferFeeHandlingSide'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'address_attributes' => 'getAddressAttributes',
        'company_id' => 'getCompanyId',
        'contact_name' => 'getContactName',
        'country_code' => 'getCountryCode',
        'default_title' => 'getDefaultTitle',
        'email' => 'getEmail',
        'invoice_payment_term_attributes' => 'getInvoicePaymentTermAttributes',
        'long_name' => 'getLongName',
        'name' => 'getName',
        'name_kana' => 'getNameKana',
        'org_code' => 'getOrgCode',
        'partner_bank_account_attributes' => 'getPartnerBankAccountAttributes',
        'partner_doc_setting_attributes' => 'getPartnerDocSettingAttributes',
        'payer_walletable_id' => 'getPayerWalletableId',
        'payment_term_attributes' => 'getPaymentTermAttributes',
        'phone' => 'getPhone',
        'shortcut1' => 'getShortcut1',
        'shortcut2' => 'getShortcut2',
        'transfer_fee_handling_side' => 'getTransferFeeHandlingSide'
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

    const COUNTRY_CODE_JP = 'JP';
    const COUNTRY_CODE_ZZ = 'ZZ';
    const ORG_CODE_1 = 1;
    const ORG_CODE_2 = 2;
    const TRANSFER_FEE_HANDLING_SIDE_PAYER = 'payer';
    const TRANSFER_FEE_HANDLING_SIDE_PAYEE = 'payee';
    

    
    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getCountryCodeAllowableValues()
    {
        return [
            self::COUNTRY_CODE_JP,
            self::COUNTRY_CODE_ZZ,
        ];
    }
    
    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getOrgCodeAllowableValues()
    {
        return [
            self::ORG_CODE_1,
            self::ORG_CODE_2,
        ];
    }
    
    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getTransferFeeHandlingSideAllowableValues()
    {
        return [
            self::TRANSFER_FEE_HANDLING_SIDE_PAYER,
            self::TRANSFER_FEE_HANDLING_SIDE_PAYEE,
        ];
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
        $this->container['address_attributes'] = $data['address_attributes'] ?? null;
        $this->container['company_id'] = $data['company_id'] ?? null;
        $this->container['contact_name'] = $data['contact_name'] ?? null;
        $this->container['country_code'] = $data['country_code'] ?? null;
        $this->container['default_title'] = $data['default_title'] ?? null;
        $this->container['email'] = $data['email'] ?? null;
        $this->container['invoice_payment_term_attributes'] = $data['invoice_payment_term_attributes'] ?? null;
        $this->container['long_name'] = $data['long_name'] ?? null;
        $this->container['name'] = $data['name'] ?? null;
        $this->container['name_kana'] = $data['name_kana'] ?? null;
        $this->container['org_code'] = $data['org_code'] ?? null;
        $this->container['partner_bank_account_attributes'] = $data['partner_bank_account_attributes'] ?? null;
        $this->container['partner_doc_setting_attributes'] = $data['partner_doc_setting_attributes'] ?? null;
        $this->container['payer_walletable_id'] = $data['payer_walletable_id'] ?? null;
        $this->container['payment_term_attributes'] = $data['payment_term_attributes'] ?? null;
        $this->container['phone'] = $data['phone'] ?? null;
        $this->container['shortcut1'] = $data['shortcut1'] ?? null;
        $this->container['shortcut2'] = $data['shortcut2'] ?? null;
        $this->container['transfer_fee_handling_side'] = $data['transfer_fee_handling_side'] ?? null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['company_id'] === null) {
            $invalidProperties[] = "'company_id' can't be null";
        }
        if (($this->container['company_id'] > 2147483647)) {
            $invalidProperties[] = "invalid value for 'company_id', must be smaller than or equal to 2147483647.";
        }

        if (($this->container['company_id'] < 1)) {
            $invalidProperties[] = "invalid value for 'company_id', must be bigger than or equal to 1.";
        }

        if (!is_null($this->container['contact_name']) && (mb_strlen($this->container['contact_name']) > 255)) {
            $invalidProperties[] = "invalid value for 'contact_name', the character length must be smaller than or equal to 255.";
        }

        $allowedValues = $this->getCountryCodeAllowableValues();
        if (!is_null($this->container['country_code']) && !in_array($this->container['country_code'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'country_code', must be one of '%s'",
                $this->container['country_code'],
                implode("', '", $allowedValues)
            );
        }

        if (!is_null($this->container['email']) && (mb_strlen($this->container['email']) > 255)) {
            $invalidProperties[] = "invalid value for 'email', the character length must be smaller than or equal to 255.";
        }

        if (!is_null($this->container['long_name']) && (mb_strlen($this->container['long_name']) > 255)) {
            $invalidProperties[] = "invalid value for 'long_name', the character length must be smaller than or equal to 255.";
        }

        if ($this->container['name'] === null) {
            $invalidProperties[] = "'name' can't be null";
        }
        if ((mb_strlen($this->container['name']) > 255)) {
            $invalidProperties[] = "invalid value for 'name', the character length must be smaller than or equal to 255.";
        }

        if (!is_null($this->container['name_kana']) && (mb_strlen($this->container['name_kana']) > 255)) {
            $invalidProperties[] = "invalid value for 'name_kana', the character length must be smaller than or equal to 255.";
        }

        $allowedValues = $this->getOrgCodeAllowableValues();
        if (!is_null($this->container['org_code']) && !in_array($this->container['org_code'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'org_code', must be one of '%s'",
                $this->container['org_code'],
                implode("', '", $allowedValues)
            );
        }

        if (!is_null($this->container['payer_walletable_id']) && ($this->container['payer_walletable_id'] > 2147483647)) {
            $invalidProperties[] = "invalid value for 'payer_walletable_id', must be smaller than or equal to 2147483647.";
        }

        if (!is_null($this->container['payer_walletable_id']) && ($this->container['payer_walletable_id'] < 1)) {
            $invalidProperties[] = "invalid value for 'payer_walletable_id', must be bigger than or equal to 1.";
        }

        if (!is_null($this->container['shortcut1']) && (mb_strlen($this->container['shortcut1']) > 255)) {
            $invalidProperties[] = "invalid value for 'shortcut1', the character length must be smaller than or equal to 255.";
        }

        if (!is_null($this->container['shortcut2']) && (mb_strlen($this->container['shortcut2']) > 255)) {
            $invalidProperties[] = "invalid value for 'shortcut2', the character length must be smaller than or equal to 255.";
        }

        $allowedValues = $this->getTransferFeeHandlingSideAllowableValues();
        if (!is_null($this->container['transfer_fee_handling_side']) && !in_array($this->container['transfer_fee_handling_side'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'transfer_fee_handling_side', must be one of '%s'",
                $this->container['transfer_fee_handling_side'],
                implode("', '", $allowedValues)
            );
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
     * Gets address_attributes
     *
     * @return \Freee\Accounting\Model\PartnerCreateParamsAddressAttributes|null
     */
    public function getAddressAttributes()
    {
        return $this->container['address_attributes'];
    }

    /**
     * Sets address_attributes
     *
     * @param \Freee\Accounting\Model\PartnerCreateParamsAddressAttributes|null $address_attributes address_attributes
     *
     * @return self
     */
    public function setAddressAttributes($address_attributes)
    {
        $this->container['address_attributes'] = $address_attributes;

        return $this;
    }

    /**
     * Gets company_id
     *
     * @return int
     */
    public function getCompanyId()
    {
        return $this->container['company_id'];
    }

    /**
     * Sets company_id
     *
     * @param int $company_id 事業所ID
     *
     * @return self
     */
    public function setCompanyId($company_id)
    {

        if (($company_id > 2147483647)) {
            throw new \InvalidArgumentException('invalid value for $company_id when calling PartnerUpdateParams., must be smaller than or equal to 2147483647.');
        }
        if (($company_id < 1)) {
            throw new \InvalidArgumentException('invalid value for $company_id when calling PartnerUpdateParams., must be bigger than or equal to 1.');
        }

        $this->container['company_id'] = $company_id;

        return $this;
    }

    /**
     * Gets contact_name
     *
     * @return string|null
     */
    public function getContactName()
    {
        return $this->container['contact_name'];
    }

    /**
     * Sets contact_name
     *
     * @param string|null $contact_name 担当者 氏名 (255文字以内)
     *
     * @return self
     */
    public function setContactName($contact_name)
    {
        if (!is_null($contact_name) && (mb_strlen($contact_name) > 255)) {
            throw new \InvalidArgumentException('invalid length for $contact_name when calling PartnerUpdateParams., must be smaller than or equal to 255.');
        }

        $this->container['contact_name'] = $contact_name;

        return $this;
    }

    /**
     * Gets country_code
     *
     * @return string|null
     */
    public function getCountryCode()
    {
        return $this->container['country_code'];
    }

    /**
     * Sets country_code
     *
     * @param string|null $country_code 地域（JP: 国内、ZZ:国外）
     *
     * @return self
     */
    public function setCountryCode($country_code)
    {
        $allowedValues = $this->getCountryCodeAllowableValues();
        if (!is_null($country_code) && !in_array($country_code, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'country_code', must be one of '%s'",
                    $country_code,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['country_code'] = $country_code;

        return $this;
    }

    /**
     * Gets default_title
     *
     * @return string|null
     */
    public function getDefaultTitle()
    {
        return $this->container['default_title'];
    }

    /**
     * Sets default_title
     *
     * @param string|null $default_title 敬称（御中、様、(空白)の3つから選択）
     *
     * @return self
     */
    public function setDefaultTitle($default_title)
    {
        $this->container['default_title'] = $default_title;

        return $this;
    }

    /**
     * Gets email
     *
     * @return string|null
     */
    public function getEmail()
    {
        return $this->container['email'];
    }

    /**
     * Sets email
     *
     * @param string|null $email 担当者 メールアドレス (255文字以内)
     *
     * @return self
     */
    public function setEmail($email)
    {
        if (!is_null($email) && (mb_strlen($email) > 255)) {
            throw new \InvalidArgumentException('invalid length for $email when calling PartnerUpdateParams., must be smaller than or equal to 255.');
        }

        $this->container['email'] = $email;

        return $this;
    }

    /**
     * Gets invoice_payment_term_attributes
     *
     * @return \Freee\Accounting\Model\PartnerCreateParamsInvoicePaymentTermAttributes|null
     */
    public function getInvoicePaymentTermAttributes()
    {
        return $this->container['invoice_payment_term_attributes'];
    }

    /**
     * Sets invoice_payment_term_attributes
     *
     * @param \Freee\Accounting\Model\PartnerCreateParamsInvoicePaymentTermAttributes|null $invoice_payment_term_attributes invoice_payment_term_attributes
     *
     * @return self
     */
    public function setInvoicePaymentTermAttributes($invoice_payment_term_attributes)
    {
        $this->container['invoice_payment_term_attributes'] = $invoice_payment_term_attributes;

        return $this;
    }

    /**
     * Gets long_name
     *
     * @return string|null
     */
    public function getLongName()
    {
        return $this->container['long_name'];
    }

    /**
     * Sets long_name
     *
     * @param string|null $long_name 正式名称（255文字以内）
     *
     * @return self
     */
    public function setLongName($long_name)
    {
        if (!is_null($long_name) && (mb_strlen($long_name) > 255)) {
            throw new \InvalidArgumentException('invalid length for $long_name when calling PartnerUpdateParams., must be smaller than or equal to 255.');
        }

        $this->container['long_name'] = $long_name;

        return $this;
    }

    /**
     * Gets name
     *
     * @return string
     */
    public function getName()
    {
        return $this->container['name'];
    }

    /**
     * Sets name
     *
     * @param string $name 取引先名 (255文字以内)
     *
     * @return self
     */
    public function setName($name)
    {
        if ((mb_strlen($name) > 255)) {
            throw new \InvalidArgumentException('invalid length for $name when calling PartnerUpdateParams., must be smaller than or equal to 255.');
        }

        $this->container['name'] = $name;

        return $this;
    }

    /**
     * Gets name_kana
     *
     * @return string|null
     */
    public function getNameKana()
    {
        return $this->container['name_kana'];
    }

    /**
     * Sets name_kana
     *
     * @param string|null $name_kana カナ名称（255文字以内）
     *
     * @return self
     */
    public function setNameKana($name_kana)
    {
        if (!is_null($name_kana) && (mb_strlen($name_kana) > 255)) {
            throw new \InvalidArgumentException('invalid length for $name_kana when calling PartnerUpdateParams., must be smaller than or equal to 255.');
        }

        $this->container['name_kana'] = $name_kana;

        return $this;
    }

    /**
     * Gets org_code
     *
     * @return int|null
     */
    public function getOrgCode()
    {
        return $this->container['org_code'];
    }

    /**
     * Sets org_code
     *
     * @param int|null $org_code 事業所種別（null: 未設定、1: 法人、2: 個人）
     *
     * @return self
     */
    public function setOrgCode($org_code)
    {
        $allowedValues = $this->getOrgCodeAllowableValues();
        if (!is_null($org_code) && !in_array($org_code, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'org_code', must be one of '%s'",
                    $org_code,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['org_code'] = $org_code;

        return $this;
    }

    /**
     * Gets partner_bank_account_attributes
     *
     * @return \Freee\Accounting\Model\PartnerCreateParamsPartnerBankAccountAttributes|null
     */
    public function getPartnerBankAccountAttributes()
    {
        return $this->container['partner_bank_account_attributes'];
    }

    /**
     * Sets partner_bank_account_attributes
     *
     * @param \Freee\Accounting\Model\PartnerCreateParamsPartnerBankAccountAttributes|null $partner_bank_account_attributes partner_bank_account_attributes
     *
     * @return self
     */
    public function setPartnerBankAccountAttributes($partner_bank_account_attributes)
    {
        $this->container['partner_bank_account_attributes'] = $partner_bank_account_attributes;

        return $this;
    }

    /**
     * Gets partner_doc_setting_attributes
     *
     * @return \Freee\Accounting\Model\PartnerCreateParamsPartnerDocSettingAttributes|null
     */
    public function getPartnerDocSettingAttributes()
    {
        return $this->container['partner_doc_setting_attributes'];
    }

    /**
     * Sets partner_doc_setting_attributes
     *
     * @param \Freee\Accounting\Model\PartnerCreateParamsPartnerDocSettingAttributes|null $partner_doc_setting_attributes partner_doc_setting_attributes
     *
     * @return self
     */
    public function setPartnerDocSettingAttributes($partner_doc_setting_attributes)
    {
        $this->container['partner_doc_setting_attributes'] = $partner_doc_setting_attributes;

        return $this;
    }

    /**
     * Gets payer_walletable_id
     *
     * @return int|null
     */
    public function getPayerWalletableId()
    {
        return $this->container['payer_walletable_id'];
    }

    /**
     * Sets payer_walletable_id
     *
     * @param int|null $payer_walletable_id 振込元口座ID（一括振込ファイル用）:（walletableのtypeが'bank_account'のidのみ指定できます。また、未設定にする場合は、nullを指定してください。）
     *
     * @return self
     */
    public function setPayerWalletableId($payer_walletable_id)
    {

        if (!is_null($payer_walletable_id) && ($payer_walletable_id > 2147483647)) {
            throw new \InvalidArgumentException('invalid value for $payer_walletable_id when calling PartnerUpdateParams., must be smaller than or equal to 2147483647.');
        }
        if (!is_null($payer_walletable_id) && ($payer_walletable_id < 1)) {
            throw new \InvalidArgumentException('invalid value for $payer_walletable_id when calling PartnerUpdateParams., must be bigger than or equal to 1.');
        }

        $this->container['payer_walletable_id'] = $payer_walletable_id;

        return $this;
    }

    /**
     * Gets payment_term_attributes
     *
     * @return \Freee\Accounting\Model\PartnerCreateParamsInvoicePaymentTermAttributes|null
     */
    public function getPaymentTermAttributes()
    {
        return $this->container['payment_term_attributes'];
    }

    /**
     * Sets payment_term_attributes
     *
     * @param \Freee\Accounting\Model\PartnerCreateParamsInvoicePaymentTermAttributes|null $payment_term_attributes payment_term_attributes
     *
     * @return self
     */
    public function setPaymentTermAttributes($payment_term_attributes)
    {
        $this->container['payment_term_attributes'] = $payment_term_attributes;

        return $this;
    }

    /**
     * Gets phone
     *
     * @return string|null
     */
    public function getPhone()
    {
        return $this->container['phone'];
    }

    /**
     * Sets phone
     *
     * @param string|null $phone 電話番号
     *
     * @return self
     */
    public function setPhone($phone)
    {
        $this->container['phone'] = $phone;

        return $this;
    }

    /**
     * Gets shortcut1
     *
     * @return string|null
     */
    public function getShortcut1()
    {
        return $this->container['shortcut1'];
    }

    /**
     * Sets shortcut1
     *
     * @param string|null $shortcut1 ショートカット１ (255文字以内)
     *
     * @return self
     */
    public function setShortcut1($shortcut1)
    {
        if (!is_null($shortcut1) && (mb_strlen($shortcut1) > 255)) {
            throw new \InvalidArgumentException('invalid length for $shortcut1 when calling PartnerUpdateParams., must be smaller than or equal to 255.');
        }

        $this->container['shortcut1'] = $shortcut1;

        return $this;
    }

    /**
     * Gets shortcut2
     *
     * @return string|null
     */
    public function getShortcut2()
    {
        return $this->container['shortcut2'];
    }

    /**
     * Sets shortcut2
     *
     * @param string|null $shortcut2 ショートカット２ (255文字以内)
     *
     * @return self
     */
    public function setShortcut2($shortcut2)
    {
        if (!is_null($shortcut2) && (mb_strlen($shortcut2) > 255)) {
            throw new \InvalidArgumentException('invalid length for $shortcut2 when calling PartnerUpdateParams., must be smaller than or equal to 255.');
        }

        $this->container['shortcut2'] = $shortcut2;

        return $this;
    }

    /**
     * Gets transfer_fee_handling_side
     *
     * @return string|null
     */
    public function getTransferFeeHandlingSide()
    {
        return $this->container['transfer_fee_handling_side'];
    }

    /**
     * Sets transfer_fee_handling_side
     *
     * @param string|null $transfer_fee_handling_side 振込手数料負担（一括振込ファイル用）: (振込元(当方): payer, 振込先(先方): payee)
     *
     * @return self
     */
    public function setTransferFeeHandlingSide($transfer_fee_handling_side)
    {
        $allowedValues = $this->getTransferFeeHandlingSideAllowableValues();
        if (!is_null($transfer_fee_handling_side) && !in_array($transfer_fee_handling_side, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'transfer_fee_handling_side', must be one of '%s'",
                    $transfer_fee_handling_side,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['transfer_fee_handling_side'] = $transfer_fee_handling_side;

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


