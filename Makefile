BASEFILE=serendipity
PICFILES=img/chmod.eps\
		 img/install.eps\
		 img/install2.eps\
		 img/install3.eps\
		 img/startseite_leer.eps\
		 img/startseite.eps\
		 img/startseite_archiv.eps\
		 img/artikelseite.eps\
		 img/startseite_kommentar.eps\
		 img/suche.eps\
		 img/usermanagement.eps\
		 img/usermanagement_new.eps\
		 img/groupmanagement.eps\
		 img/groupmanagement_edit.eps\
		 img/import.eps\
		 img/import_wp.eps\
		 img/konfiguration.eps\
		 img/plugins.eps\
		 img/plugin_new.eps\
		 img/styles.eps\
		 img/styles_cap.eps\
		 img/login.eps\
		 img/backend.eps\
		 img/einstellungen.eps\
		 img/edit_entries.eps\
		 img/categories.eps\
		 img/categories2.eps\
		 img/comments.eps\
		 img/comments2.eps\
		 img/new_entry.eps\
		 img/mdb_popup.eps\
		 img/mdb_popup2.eps\
		 img/upload.eps\
		 img/upload2.eps\
		 img/mdb.eps\
		 img/mdb_verzverwalt.eps\
		 img/mdb_verzverwalt_neu.eps\
		 img/mdb_verzverwalt_edit.eps\
		 img/mdb_verzverwalt_del.eps\
		 img/logo.eps\
		 img/quicknotes.eps\
		 img/startseite_leer.eps\
		 img/dbrel.eps

help:
	@(echo -e "make help\t zeigt diese Hilfe an.")
	@(echo -e "make dvi\t generiert ein dvi-File.")
	@(echo -e "make index\t generiert ein dvi-File mit aktualisiertem Index.")
	@(echo -e "make dvi\t generiert ein dvi-File.")
	@(echo -e "make ps \t generiert ein PostScript-File inklusive Index.")
	@(echo -e "make pdf\t generiert ein PDF inklusive Index.")
	@(echo -e "make nopicpdf\t generiert ein PDF inklusive Index, ohne Bilder.")
	@(echo -e "make all\t generiert ein dvi-, ps- und pdf-File inklusive Index.")
	@(echo -e "make stats\t sortiert die .tex-Files absteigend nach der Zeilenanzahl.\n           \t Gibt zu jeder Datei die Anzahl der enthaltenen Zeilen,\n         \t Woerter und Bytes aus. Die erste Zeile zeigt die Summe \n           \t für das komplette Manuskript. (Dank an Heiko Rommel)")
	@(echo -e "make marks\t listet auf, wieviele Kommentare der Form\n           \t %<Kuerzel> (z.B.: '%PJ') jede .tex-Datei enthält.\n           \t (Dank an Heiko Rommel)")
	@(echo -e "make todos\t listet alle TODO-Zeilen und den Namen der entsprechenden\n           \t Datei auf.") 
	@(echo -e "make clean\t löscht alle von make dvi, index, ps und pdf generierten\n           \t Dateien.")

all: dvi index ps pdf

dvi: *.tex $(PICFILES:.png=.eps)
	latex $(BASEFILE)
	latex $(BASEFILE)

%.eps: %.png
	convert $< $@

index: dvi
	makeindex $(BASEFILE)
	latex $(BASEFILE)

ps: index
	dvips $(BASEFILE)

pdf: index
	dvipdf $(BASEFILE)

nopicpdf:
	@(mkdir nopicpdf 2>/dev/null ; cp -r snippets nopicpdf ; cp *.tex nopicpdf ; cp *.sty nopicpdf ; cd nopicpdf ; find . -name \*.tex -exec sed -i 's/\\ospfigure/%\\ospfigure/' {} \; ; latex $(BASEFILE) ; latex $(BASEFILE) ; makeindex $(BASEFILE) ; latex $(BASEFILE) ; dvipdf $(BASEFILE) ; cp $(BASEFILE).pdf ../nopic-$(BASEFILE).pdf ; cd .. ; rm -rf nopicpdf/)

stats:
	@(echo -e "Zeilen\tWoerter\tBytes")
	@(wc *.tex 2> /dev/null | sort -k1,1 -nr)

marks:
	@(echo $(BASEFILE) | while read i; do f=$${i%\}*}; f=$${f#*\{}.tex; n=$$(grep -Ei "^% *(PJ|MW|UW|GH)" $$f | wc -l); echo "$$n	$$f"; done)
	@(grep "include{" $(BASEFILE).tex | while read i; do f=$${i%\}*}; f=$${f#*\{}.tex; n=$$(grep -Ei "^% *(PJ|MW|UW|GH)" $$f | wc -l); echo "$$n	$$f"; done)

todos:
	@(grep "TODO" *.tex)

clean:
	rm -v -f *.aux *.log *.dvi *.ps *.pdf *.ind *.idx *.ilg *.toc *.bbl
