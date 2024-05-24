SELECT
    `user`,
    `metode`,
    SUM(`matang`) AS subtotal_matang,
    SUM(`mentah`) AS subtotal_mentah
FROM
    `hasil_panen`
WHERE
    (`user` = '0001' AND `metode` = 'manual') OR
    (`user` = '0001' AND `metode` = 'mekanis')
GROUP BY
    `user`,
    `metode`
UNION ALL
SELECT
    'Grand Total' AS `user`,
    '' AS `metode`,
    SUM(subtotal_matang) AS grand_total_matang,
    SUM(subtotal_mentah) AS grand_total_mentah
FROM (
    SELECT
        `user`,
        `metode`,
        SUM(`matang`) AS subtotal_matang,
        SUM(`mentah`) AS subtotal_mentah
    FROM
        `hasil_panen`
    WHERE
        (`user` = '0001' AND `metode` = 'manual') OR
        (`user` = '0001' AND `metode` = 'mekanis')
    GROUP BY
        `user`,
        `metode`
) AS subtotals;
