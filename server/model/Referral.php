<?php
namespace app\model;

use app\config\DatabaseHandler;
// investment plans model
    class Referral extends BaseModel{

        private $table_name = 'referrals_tb';

        function __construct(DatabaseHandler $databaseHandler)
        {
            parent::__construct($databaseHandler);
        }

        // new referral
        function newReferral(array $new_referrer){
            $sql = "INSERT INTO $this->table_name(referral_slug, referral_user_id,
            referral_referredby) VALUES(:referral_slug, :new_user_id, :referredby)";
            $response = $this->insert($sql, $new_referrer, "referral_slug");
            return $response;
        }
        // find referral by slug
        function findReferralsBySlug(string $slug ): array{
            $sql = "SELECT * FROM $this->table_name WHERE referral_slug=?";
            $response = $this->fetch($sql, [$slug]);
            return $response;
        }

        // find referral by user id
        function findReferralsByUserId(int $id ): array{
            $sql = "SELECT $this->table_name.referral_status, $this->table_name.createdAt, users_tb.user_email, users_tb.user_username FROM $this->table_name LEFT JOIN users_tb ON users_tb.user_id = $this->table_name.referral_user_id WHERE referral_referredby=?";
            $response = $this->fetchMany($sql, [$id]);
            return $response;
        }

        
        // find all referrals
        function findAllReferrers(): array{
            $sql = "SELECT * FROM $this->table_name";
            $response = $this->fetch($sql);
            return $response;
        }
        // update referral status
        function updateReferralStatus(int $status, string $slug): bool{
            $sql = "UPDATE $this->table_name SET referral_status = ? WHERE referral_slug = ?";
            $response = $this->update($sql, [$status, $slug]);
            return $response;
        }
        // delete referral
    }


?>