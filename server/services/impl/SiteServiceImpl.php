<?php

    namespace app\services\impl;
    
    interface SiteServiceImpl{
        function findRecord(): string;
        function editRecord(array $new): string;

        function findContact(): string;
        function editContact(array $new): string;

        function findStatistics(): string;
        function createStatistic(array $new): string;

        function createFaq(array $new): string;
        function findFaqs(): string;
        function findFaqsByAffiliate(): string;
        function editFaqs(array $new): string;
    }

?>