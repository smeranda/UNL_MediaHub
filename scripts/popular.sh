bzgrep "GET /mediahub/media/" www1.unl.edu-access_log | awk '{ print $7 }' | grep -v format=xml | sort | uniq -c | sort -nr | head -n 10 > popular.txt