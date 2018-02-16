#!/bin/bash
#
#
###############################

if [ -z "$1" ]
  then
    echo "####"
    exit 0
fi

ENV=$1

if [ $ENV == '####' ]; then

    ####_IP='####'
    ####='####'
    ####='####'
    ####='####'


    TH_DASH_IP='####'
    TH_DASH_BASE='####'
    TH_DASH_USER='####'
    TH_DASH_PASS='####'


elif [ $ENV == '####' ]; then

  ####='####'
  ####='####'
  ####='####'
  ####='####'

  TH_DASH_IP='####'
  TH_DASH_BASE='####'
  TH_DASH_USER='####'
  TH_DASH_PASS='####'

elif [ $ENV == '####' ] || [ $ENV == '####' ] || [ $ENV == '####' ] || [ $ENV == '####' ] || [ $ENV == '####' ]; then
    environement=${ENV,,}

  ####='####'
  ####='####-'$environement
  ####='####'
  ####='####'

  TH_DASH_IP='####'
  TH_DASH_BASE='####'$environement
  TH_DASH_USER='####'
  TH_DASH_PASS='####'
else
    echo "####"
    exit 0
fi

echo "Generate 24H1.sql"
php "$(pwd)/sql/24H1.php" --db-website-name="$####" --db-dashboard-name="$####" > "$(pwd)/sql/24H1.sql"
echo "Run 24H1.sql"
mysql --user="$TH_DASH_USER" --host="$TH_DASH_IP" --password="$TH_DASH_PASS" --database="$TH_DASH_BASE" -N < "$(pwd)/sql/24H1.sql";


echo "Generate 24H2.sql"
php "$(pwd)/sql/24H2.php" --db-website-name="$####" --db-dashboard-name="$TH_DASH_BASE" > "$(pwd)/sql/24H2.sql"
echo "Run 24H2.sql"
mysql --user="$TH_DASH_USER" --host="$TH_DASH_IP" --password="$TH_DASH_PASS" --database="$TH_DASH_BASE" -N < "$(pwd)/sql/24H2.sql";


echo "Generate 24H3.sql"
php "$(pwd)/sql/24H3.php" --db-website-name="$####" --db-dashboard-name="$TH_DASH_BASE" > "$(pwd)/sql/24H3.sql"
echo "Run 24H3.sql"
mysql --user="$TH_DASH_USER" --host="$TH_DASH_IP" --password="$TH_DASH_PASS" --database="$TH_DASH_BASE" -N < "$(pwd)/sql/24H3.sql";


echo "Generate 24H4_1.sql"
php "$(pwd)/sql/24H4_1.php" --db-website-name="$####" --db-dashboard-name="$TH_DASH_BASE" > "$(pwd)/sql/24H4_1.sql"
echo "Run 24H4_1.sql"
mysql --user="$TH_DASH_USER" --host="$TH_DASH_IP" --password="$TH_DASH_PASS" --database="$TH_DASH_BASE" -N < "$(pwd)/sql/24H4_1.sql";


echo "Generate 24H4_2.sql"
php "$(pwd)/sql/24H4_2.php" --db-website-name="$####" --db-dashboard-name="$TH_DASH_BASE" > "$(pwd)/sql/24H4_2.sql"
echo "Run 24H4_2.sql"
mysql --user="$TH_DASH_USER" --host="$TH_DASH_IP" --password="$TH_DASH_PASS" --database="$TH_DASH_BASE" -N < "$(pwd)/sql/24H4_2.sql";


echo "Generate 24H4_3.sql"
php "$(pwd)/sql/24H4_3.php" --db-website-name="$####" --db-dashboard-name="$TH_DASH_BASE" > "$(pwd)/sql/24H4_3.sql"
echo "Run 24H4_3.sql"
mysql --user="$TH_DASH_USER" --host="$TH_DASH_IP" --password="$TH_DASH_PASS" --database="$TH_DASH_BASE" -N < "$(pwd)/sql/24H4_3.sql"


echo "Generate 24H4_4.sql"
php "$(pwd)/sql/24H4_4.php" --db-website-name="$####" --db-dashboard-name="$TH_DASH_BASE" > "$(pwd)/sql/24H4_4.sql"
echo "Run 24H4_4.sql"
mysql --user="$TH_DASH_USER" --host="$TH_DASH_IP" --password="$TH_DASH_PASS" --database="$TH_DASH_BASE" -N < "$(pwd)/sql/24H4_4.sql"


echo "Generate 24H5.sql"
php "$(pwd)/sql/24H5.php" --db-website-name="$####" --db-dashboard-name="$TH_DASH_BASE" > "$(pwd)/sql/24H5.sql"
echo "Run 24H5.sql"
mysql --user="$TH_DASH_USER" --host="$TH_DASH_IP" --password="$TH_DASH_PASS" --database="$TH_DASH_BASE" -N < "$(pwd)/sql/24H5.sql"


echo "Generate 24H6.sql"
php "$(pwd)/sql/24H6.php" --db-website-name="$####" --db-dashboard-name="$TH_DASH_BASE" > "$(pwd)/sql/24H6.sql"
echo "Run 24H6.sql"
mysql --user="$TH_DASH_USER" --host="$TH_DASH_IP" --password="$TH_DASH_PASS" --database="$TH_DASH_BASE" -N < "$(pwd)/sql/24H6.sql"
