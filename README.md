Zabbix Status
=============

Zabbix is a very nice tool; it's served me well for the last decade or so.
The one complaint I have is that the interface can be overwhelming when you're monitoring more than a few hosts.
At least, that's how I generally feel about it, as well as quite a few others I've conversed with over the years.
There are two pieces of functionality that I end up always adding: a simple status page (what you're looking at), and a simple summary page (hosted in a different repository).

These pages give you a simple status page which tracks Zabbix's "IT Services". Currently, it's working against Zabbix 2.4 with a MySQL database.

Fill out "variables.php" and drop the PHP scripts where you'd like; I usually put them in [webroot]/status, or something along those lines. The "status.php" script is the origin.

Stuff left that I'd like to do someday:
* Produce JSON (maybe XML) output
  * I've done this at work, but I'm lazy to port it right now
* Other databases, e.g., Oracle?

Licensed under the GPLv3.

Enjoy.
