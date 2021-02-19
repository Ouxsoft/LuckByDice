# Simple shell script to build docs

# :set ff=unix required when editing

echo "Run Doxyfile"
/usr/bin/doxygen Doxyfile

echo "run Doxyphp2sphinx"
/usr/local/bin/doxyphp2sphinx Ouxsoft::LuckByDice

echo "Complete"
