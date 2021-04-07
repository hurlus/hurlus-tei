/([^ >’])([\(«])/$1 $2/ # espace manquant avant ponctuation ouvrante
/([^ (!?<"]) *([!;?])/$1 $2/ # espace manquant avant ponctuation double
/([,\.])([^\n ) <\-\.\]])/$1 $2/ # Attention, abréviations, URL
/([^  ])([;:!?»])/$1 $2/ # Attention, abréviations, URL
/ ([;:!?»])/ $1/ # espace -> insécable (fiable)
/([«]) /$1 / # espace -> insécable (fiable)

