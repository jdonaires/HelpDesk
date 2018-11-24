SELECT DISTINCT
  GROUP_CONCAT( DISTINCT
    CONCAT(
      'IFNULL(COUNT(CASE WHEN DATE_FORMAT(TIC.FechaCrea, ''%Y-%m'') = ''',
      DATE_FORMAT(FechaCrea, '%Y-%m'),
      ''' THEN TIC.FechaCrea END),0) AS `',
       DATE_FORMAT(FechaCrea, '%Y-%m'), '`'
    )
  ) INTO @sql3
FROM
  helpdesk_ticket ;
  
  
SET @sql = CONCAT('SELECT USU.Nombre , ', @sql3, ' 
                  FROM helpdesk_ticket TIC
					INNER JOIN HelpDesk_Usuario USU ON USU.IdUsuario = TIC.IdCliente
                   GROUP BY IdCliente');
                   

SELECT @SQL;
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;