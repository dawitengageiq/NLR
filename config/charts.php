<?php

return [

    'phantomjs' => public_path('charts/phantom_js/bin/phantomjs'),

    'highcharts_convert' => public_path('charts/highcharts-convert.js'),

    'infile' => public_path('charts/images/options.json'),

    'constr' => 'Chart',

    'outfile' => [
        'high' => public_path('charts/images/high.png'),
        'critical' => public_path('charts/images/critical.png')
    ],

    'column_attributes' => [
        0 => ['point_width' => 22, 'group_padding' => 0.48],
        1 => ['point_width' => 22, 'group_padding' => 0.48],
        2 => ['point_width' => 22, 'group_padding' => 0.458],
        3 => ['point_width' => 22, 'group_padding' => 0.438],
        4 => ['point_width' => 22, 'group_padding' => 0.418],
        5 => ['point_width' => 22, 'group_padding' => 0.4],
        6 => ['point_width' => 22, 'group_padding' => 0.38],
        7 => ['point_width' => 22, 'group_padding' => 0.35],
        8 => ['point_width' => 22, 'group_padding' => 0.335],
        9 => ['point_width' => 22, 'group_padding' => 0.32],
        10 => ['point_width' => 21, 'group_padding' => 0.3],
        11 => ['point_width' => 20, 'group_padding' => 0.29],
        12 => ['point_width' => 20, 'group_padding' => 0.27],
        13 => ['point_width' => 19, 'group_padding' => 0.26],
        14 => ['point_width' => 18, 'group_padding' => 0.24],
        15 => ['point_width' => 18, 'group_padding' => 0.24],
        16 => ['point_width' => 18, 'group_padding' => 0.23],
        17 => ['point_width' => 18, 'group_padding' => 0.22],
        18 => ['point_width' => 17, 'group_padding' => 0.21],
        19 => ['point_width' => 17, 'group_padding' => 0.20],
        20 => ['point_width' => 16, 'group_padding' => 0.19],
        21 => ['point_width' => 16, 'group_padding' => 0.18],
        22 => ['point_width' => 15, 'group_padding' => 0.17],
        23 => ['point_width' => 14, 'group_padding' => 0.2],
        24 => ['point_width' => 13, 'group_padding' => 0.18],
        25 => ['point_width' => 12, 'group_padding' => 0.2],
    ],

    'dummy_serialized_data' => Array (
        0 => Array
            (
                'revenue_tracker_column' => 1,
                'affiliate_id' => 1,
                'campaign_id' => 27,
                'campaign' => 'Quick Bucks Research (981)',
                'reject_rate' => 'HIGH',
                'actual_rejection' => '14.29%',
                'split' => 'Others = 100.00%',
                'lead_count' => 14
            ),

        1 => Array
            (
                'revenue_tracker_column' => 1,
                'affiliate_id' => 1,
                'campaign_id' => 17,
                'campaign' => 'Inbox Dollars CR DOI(291)',
                'reject_rate' => 'HIGH',
                'actual_rejection' => '15.38%',
                'split' => 'Others = 100.00%',
                'lead_count' => 14
            ),

        2 => Array
            (
                'revenue_tracker_column' => 1,
                'affiliate_id' => 1,
                'campaign_id' => 20,
                'campaign' => 'Fusion Cash (967)',
                'reject_rate' => 'HIGH',
                'actual_rejection' => '15.38%',
                'split' => 'Others = 100.00%',
                'lead_count' => 14
            ),

        3 => Array
            (
                'revenue_tracker_column' => 7831,
                'affiliate_id' => 7831,
                'campaign_id' => 13,
                'campaign' => 'Shadow Shopper (109)',
                'reject_rate' => 'HIGH',
                'actual_rejection' => '25.00%',
                'split' => 'Filter Issue = 100.00%',
                'lead_count' => 4
            ),

        4 => Array
            (
                'revenue_tracker_column' => 7877,
                'affiliate_id' => 7877,
                'campaign_id' => 1,
                'campaign' => 'Toluna Co-Reg DOI(95)',
                'reject_rate' => 'CRITICAL',
                'actual_rejection' => '100.00%',
                'split' => 'Duplicates = 75.00%, Others = 25.00%',
                'lead_count' => 4
            ),

        5 => Array
            (
                'revenue_tracker_column' => 7831,
                'affiliate_id' => 7831,
                'campaign_id' => 6,
                'campaign' => 'MindsPay Co-reg SOI Coreg (951)',
                'reject_rate' => 'CRITICAL',
                'actual_rejection' => '100.00%',
                'split' => 'Filter Issue = 100.00%',
                'lead_count' => 4
            ),

        6 => Array
            (
                'revenue_tracker_column' => 7735,
                'affiliate_id' => 7735,
                'campaign_id' => 2,
                'campaign' => 'MySurvey Coreg SOI (1011)',
                'reject_rate' => 'HIGH',
                'actual_rejection' => '50.00%',
                'split' => 'Duplicates = 50.00%, Pre-pop Issue = 50.00%',
                'lead_count' => 4
            ),

        7 => Array
            (
                'revenue_tracker_column' => 7823,
                'affiliate_id' => 7823,
                'campaign_id' => 6,
                'campaign' => 'MindsPay Co-reg SOI Coreg (951)',
                'reject_rate' => 'HIGH',
                'actual_rejection' => '50.00%',
                'split' => 'Pre-pop Issue = 100.00%',
                'lead_count' => 3
            ),

        8 => Array
            (
                'revenue_tracker_column' => 7863,
                'affiliate_id' => 7863,
                'campaign_id' => 4,
                'campaign' => 'GlobalTestMarket co-reg (913)',
                'reject_rate' => 'CRITICAL',
                'actual_rejection' => '100.00%',
                'split' => 'Filter Issue = 50.00%, Pre-pop Issue = 50.00%',
                'lead_count' => 3
            ),

        9 => Array
            (
                'revenue_tracker_column' => 7909,
                'affiliate_id' => 7909,
                'campaign_id' => 9,
                'campaign' => 'Web Clients\' Smoker Desktop DOI(1012)',
                'reject_rate' => 'HIGH',
                'actual_rejection' => '66.67%',
                'split' => 'Others = 100.00%',
                'lead_count' => 3
            ),

        10 => Array
            (
                'revenue_tracker_column' => 165,
                'affiliate_id' => 165,
                'campaign_id' => 2,
                'campaign' => 'MySurvey Coreg SOI (1011)',
                'reject_rate' => 'CRITICAL',
                'actual_rejection' => '100.00%',
                'split' => 'Pre-pop Issue = 100.00%',
                'lead_count' => 3
            ),

        11 => Array
            (
                'revenue_tracker_column' => 7913,
                'affiliate_id' => 7913,
                'campaign_id' => 2,
                'campaign' => 'MySurvey Coreg SOI (1011)',
                'reject_rate' => 'HIGH',
                'actual_rejection' => '50.00%',
                'split' => 'Others = 100.00%',
                'lead_count' => 3
            ),

        12 => Array
            (
                'revenue_tracker_column' => 7920,
                'affiliate_id' => 7920,
                'campaign_id' => 9,
                'campaign' => 'Web Clients\' Smoker Desktop DOI(1012)',
                'reject_rate' => 'CRITICAL',
                'actual_rejection' => '100.00%',
                'split' => 'Duplicates = 33.33%, Filter Issue = 33.33%, Pre-pop Issue = 33.33%',
                'lead_count' => 3
            ),

        13 => Array
            (
                'revenue_tracker_column' => 7872,
                'affiliate_id' => 7872,
                'campaign_id' => 4,
                'campaign' => 'GlobalTestMarket co-reg (913)',
                'reject_rate' => 'HIGH',
                'actual_rejection' => '66.67%',
                'split' => 'Pre-pop Issue = 100.00%',
                'lead_count' => 3
            ),

        14 => Array
            (
                'revenue_tracker_column' => 169,
                'affiliate_id' => 169,
                'campaign_id' => 4,
                'campaign' => 'GlobalTestMarket co-reg (913)',
                'reject_rate' => 'HIGH',
                'actual_rejection' => '33.33%',
                'split' => 'Others = 100.00%',
                'lead_count' => 3
            ),

        15 => Array
            (
                'revenue_tracker_column' => 7744,
                'affiliate_id' => 7744,
                'campaign_id' => 8,
                'campaign' => 'Web Clients\' Smoker Mobile DOI(1003)',
                'reject_rate' => 'CRITICAL',
                'actual_rejection' => '100.00%',
                'split' => 'Pre-pop Issue = 100.00%',
                'lead_count' => 3
            ),

        16 => Array
            (
                'revenue_tracker_column' => 7799,
                'affiliate_id' => 7799,
                'campaign_id' => 7,
                'campaign' => 'Jobs2shop.com Coreg (973)',
                'reject_rate' => 'HIGH',
                'actual_rejection' => '33.33%',
                'split' => 'Filter Issue = 100.00%',
                'lead_count' => 3
            ),

        17 => Array
            (
                'revenue_tracker_column' => 7890,
                'affiliate_id' => 7890,
                'campaign_id' => 15,
                'campaign' => 'Verde Energy (1034)',
                'reject_rate' => 'HIGH',
                'actual_rejection' => '50.00%',
                'split' => 'Others = 100.00%',
                'lead_count' => 3
            ),

        18 => Array
            (
                'revenue_tracker_column' => 7846,
                'affiliate_id' => 7846,
                'campaign_id' => 15,
                'campaign' => 'Verde Energy (1034)',
                'reject_rate' => 'HIGH',
                'actual_rejection' => '66.67%',
                'split' => 'Duplicates = 50.00%, Others = 50.00%',
                'lead_count' => 3
            ),

        19 => Array
            (
                'revenue_tracker_column' => '[Strosin Inc (123)]',
                'affiliate_id' => 123,
                'campaign_id' => 4,
                'campaign' => 'GlobalTestMarket co-reg (913)',
                'reject_rate' => 'CRITICAL',
                'actual_rejection' => '100.00%',
                'split' => 'Duplicates = 33.33%, Filter Issue = 33.33%, Others = 33.33%',
                'lead_count' => 3
            ),

        20 => Array
            (
                'revenue_tracker_column' => 7942,
                'affiliate_id' => 7942,
                'campaign_id' => 6,
                'campaign' => 'MindsPay Co-reg SOI Coreg (951)',
                'reject_rate' => 'HIGH',
                'actual_rejection' => '33.33%',
                'split' => 'Pre-pop Issue = 100.00%',
                'lead_count' => 3
            ),

        21 => Array
            (
                'revenue_tracker_column' => 7907,
                'affiliate_id' => 7907,
                'campaign_id' => 7,
                'campaign' => 'Jobs2shop.com Coreg (973)',
                'reject_rate' => 'CRITICAL',
                'actual_rejection' => '100.00%',
                'split' => 'Duplicates = 50.00%, Others = 50.00%',
                'lead_count' => 3
            ),

        22 => Array
            (
                'revenue_tracker_column' => 7873,
                'affiliate_id' => 7873,
                'campaign_id' => 4,
                'campaign' => 'GlobalTestMarket co-reg (913)',
                'reject_rate' => 'HIGH',
                'actual_rejection' => '66.67%',
                'split' => 'Duplicates = 50.00%, Others = 50.00%',
                'lead_count' => 3
            ),

        23 => Array
            (
                'revenue_tracker_column' => 7744,
                'affiliate_id' => 7744,
                'campaign_id' => 2,
                'campaign' => 'MySurvey Coreg SOI (1011)',
                'reject_rate' => 'CRITICAL',
                'actual_rejection' => '100.00%',
                'split' => 'Duplicates = 50.00%, Pre-pop Issue = 50.00%',
                'lead_count' => 3
            ),

        24 => Array
            (
                'revenue_tracker_column' => 7896,
                'affiliate_id' => 7896,
                'campaign_id' => 1,
                'campaign' => 'Toluna Co-Reg DOI(95)',
                'reject_rate' => 'CRITICAL',
                'actual_rejection' => '100.00%',
                'split' => 'Filter Issue = 100.00%',
                'lead_count' => 3
            ),

        25 => Array
            (
                'revenue_tracker_column' => 7838,
                'affiliate_id' => 7838,
                'campaign_id' => 13,
                'campaign' => 'Shadow Shopper (109)',
                'reject_rate' => 'CRITICAL',
                'actual_rejection' => '100.00%',
                'split' => 'Filter Issue = 50.00%, Others = 50.00%',
                'lead_count' => 3
            ),

        26 => Array
            (
                'revenue_tracker_column' => 78381,
                'affiliate_id' => 78381,
                'campaign_id' => 131,
                'campaign' => 'Shadow Shopper (1091)',
                'reject_rate' => 'CRITICAL',
                'actual_rejection' => '100.00%',
                'split' => 'Filter Issue = 50.00%, Others = 50.00%',
                'lead_count' => 3
            ),

        27 => Array
            (
                'revenue_tracker_column' => 78382,
                'affiliate_id' => 78382,
                'campaign_id' => 132,
                'campaign' => 'Shadow Shopper (1092)',
                'reject_rate' => 'CRITICAL',
                'actual_rejection' => '100.00%',
                'split' => 'Filter Issue = 50.00%, Others = 50.00%',
                'lead_count' => 3
            ),

        28 => Array
            (
                'revenue_tracker_column' => 78383,
                'affiliate_id' => 78383,
                'campaign_id' => 133,
                'campaign' => 'Shadow Shopper (1093)',
                'reject_rate' => 'CRITICAL',
                'actual_rejection' => '100.00%',
                'split' => 'Filter Issue = 50.00%, Others = 50.00%',
                'lead_count' => 3
            ),

        29 => Array
            (
                'revenue_tracker_column' => 78384,
                'affiliate_id' => 78384,
                'campaign_id' => 134,
                'campaign' => 'Shadow Shopper (1094)',
                'reject_rate' => 'CRITICAL',
                'actual_rejection' => '100.00%',
                'split' => 'Filter Issue = 50.00%, Others = 50.00%',
                'lead_count' => 3
            ),

        30 => Array
            (
                'revenue_tracker_column' => 78385,
                'affiliate_id' => 78385,
                'campaign_id' => 135,
                'campaign' => 'Shadow Shopper (1095)',
                'reject_rate' => 'CRITICAL',
                'actual_rejection' => '100.00%',
                'split' => 'Filter Issue = 50.00%, Others = 50.00%',
                'lead_count' => 3
            )
    )
];
