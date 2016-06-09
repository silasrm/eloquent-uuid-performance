# Benchmark of optimizaton uuid store in alsofronie/eloquent-uuid

Original Package: https://github.com/alsofronie/eloquent-uuid/

My Package: https://github.com/silasrm/eloquent-uuid

Results

```
Benchmark with 100k inserts on User (users) and UserOp (usersop)

SQLite In Memory

☁  eloquent-uuid-performance  php src/normal.php
Time: 133.37646007538
Memory Usage: 3.25 MB
☁  eloquent-uuid-performance  php src/optimized.php
Time: 145.05079603195
Memory Usage: 3.25 MB
☁  eloquent-uuid-performance  php src/incremental.php
Time: 137.17004394531
Memory Usage: 3 MB

SQLite In File

☁  eloquent-uuid-performance  php src/normal-file.php
Time: 323.51243901253
Memory Usage: 3.25 MB
Size: 9,9 MB
☁  eloquent-uuid-performance  php src/optimized-file.php
Time: 420.23021888733
Memory Usage: 3.25 MB
Size: 9,9 MB
☁  eloquent-uuid-performance  php src/incremental-file.php
Time: 324.19542098045
Memory Usage: 3 MB
Size: 8,1 MB



Benchmark with 100 inserts on User (users) and UserOp (usersop), 
and 100 Post or PostOp for each User or UserOp

SQLite In Memory

☁  eloquent-uuid-performance  php src/normal-with-post.php
Time: 1.4518489837646
Memory Usage: 3.25 MB
☁  eloquent-uuid-performance  php src/optimized-with-post.php
Time: 1.231616973877
Memory Usage: 3.25 MB
☁  eloquent-uuid-performance  php src/incremental-with-post.php
Time: 1.7930979728699
Memory Usage: 3.25 MB

SQLite In File

☁  eloquent-uuid-performance  php src/normal-with-post-file.php
Time: 2.9804191589355
Memory Usage: 3.25 MB
Size: 104 KB
☁  eloquent-uuid-performance  php src/optimized-with-post-file.php
Time: 3.6536269187927
Memory Usage: 3.25 MB
Size: 104 KB
☁  eloquent-uuid-performance  php src/incremental-with-post-file.php
Time: 4.7274348735809
Memory Usage: 3.25 MB
Size: 76 KB



Benchmark listing users  and yours posts using relationship

SQLite In Memory

☁  eloquent-uuid-performance  php src/normal-list.php
Time: 0.083611965179443
Memory Usage: 2.5 MB
☁  eloquent-uuid-performance  php src/optimized-list.php
Time: 0.085762977600098
Memory Usage: 2.5 MB
☁  eloquent-uuid-performance  php src/incremental-list.php
Time: 0.1990180015564
Memory Usage: 2.25 MB

SQLite In File

☁  eloquent-uuid-performance  php src/normal-list-file.php
Time: 0.12420511245728
Memory Usage: 2.5 MB
Size: 104 KB
☁  eloquent-uuid-performance  php src/optimized-list-file.php
Time: 0.12102603912354
Memory Usage: 2.5 MB
Size: 104 KB
☁  eloquent-uuid-performance  php src/incremental-list-file.php
Time: 0.24037885665894
Memory Usage: 2.25 MB
Size: 76 KB

```