# -*- coding: utf-8 -*-
from PyQt5 import QtCore, QtGui, QtWidgets
import MySQLdb as mdb
import ast
import mysql.connector

global LoadData


def MyConverter(mydata):
    def cvt(data):
        try:
            return ast.literal_eval(data)

        except Exception:
            return str(data)

    return tuple(map(cvt, mydata))
    self.book_table.rowCount(0)


class Ui_myworld(object):

    def addBook(self):

        try:

            mydb = mysql.connector.connect(
                host="localhost",
                user="root",
                passwd="",
                database="library",
            )
            mydb.set_character_set_name('utf8')
            mycursor = mydb.cursor()

            bn = self.book_name.text()
            cp = self.n_of_pages.text()
            au = self.author.text()
            isbn = self.isbn.text()
            default_book_photo = "img/noimage.png"
            count1 = 0
            count2 = 0
            count3 = 0
            count4 = 0

            if any(char.isdigit() for char in bn):
                self.messagebox('Connection', 'Please do not include digits in your book name')
                count1 = count1 + 1
            if any(char.isdigit() for char in au):
                self.messagebox('Connection', 'Please do not include digits in your author name')
                count2 = count2 + 1
            if any(char.isalpha() for char in cp):
                self.messagebox('Connection', 'Please do not include digits in your book pages count')
                count3 = count3 + 1
            if any(char.isalpha() for char in isbn):
                self.messagebox('Connection', 'Please do not include digits in your books isbn number')
                count4 = count4 + 1

            countSum = count1 + count2 + count3 + count4

            if countSum > 0:
                sys.exit()
            else:
                sql = "INSERT INTO books (book_name,book_pages,book_isbn,book_author,book_photo) VALUES (%s,%s,%s,%s,%s)"
                val = [(str(bn), cp, isbn, str(au), default_book_photo)]
                mycursor.executemany(sql, val)
                mydb.commit()
                self.messagebox('Inserted Data', 'Data Inserted Successfully')
                self.book_name.setText("")
                self.n_of_pages.setText("")
                self.author.setText("")
                self.isbn.setText("")
                self.LoadData()

        except:
            self.messagebox('Check Your Input', 'Please check your input')

    def messagebox(self, title, message):
        mess = QtWidgets.QMessageBox()
        mess.setWindowTitle(title)
        mess.setText(message)
        mess.setStandardButtons(QtWidgets.QMessageBox.Ok)
        mess.exec()

    def LoadData(self):
        mydb = mysql.connector.connect(
            host="localhost",
            user="root",
            passwd="",
            database="library",
        )
        mydb.set_character_set_name('utf8')
        mycursor = mydb.cursor()
        mycursor.execute("select book_id,book_isbn,book_name,book_pages,book_author from books")

        myresult = mycursor.fetchall()
        self.book_table.setRowCount(mycursor.rowcount / 3 - 1)

        for row in myresult:
            self.addTable(MyConverter(row))

        mycursor.close()

    def addTable(self, colums):
        rowPosition = self.book_table.rowCount()
        self.book_table.insertRow(rowPosition)
        for i, column in enumerate(colums):
            self.book_table.setItem(rowPosition, i, QtWidgets.QTableWidgetItem(str(column)))

    def setupUi(self, myworld):
        myworld.setObjectName("myworld")
        myworld.resize(800, 800)
        self.centralwidget = QtWidgets.QWidget(myworld)
        self.centralwidget.setObjectName("centralwidget")
        self.book_table = QtWidgets.QTableWidget(self.centralwidget)
        self.book_table.setGeometry(QtCore.QRect(70, 290, 680, 251))
        self.book_table.setObjectName("book_table")
        self.book_table.setColumnCount(5)
        self.book_table.setRowCount(100)
        self.label = QtWidgets.QLabel(self.centralwidget)
        self.label.setGeometry(QtCore.QRect(70, 60, 55, 16))
        self.label.setObjectName("label")
        self.isbn = QtWidgets.QLineEdit(self.centralwidget)
        self.isbn.setGeometry(QtCore.QRect(190, 60, 200, 22))
        self.isbn.setObjectName("isbn")
        self.label_2 = QtWidgets.QLabel(self.centralwidget)
        self.label_2.setGeometry(QtCore.QRect(70, 100, 200, 16))
        self.label_2.setObjectName("label_2")
        self.book_name = QtWidgets.QLineEdit(self.centralwidget)
        self.book_name.setGeometry(QtCore.QRect(190, 100, 200, 22))
        self.book_name.setObjectName("book_name")
        self.label_3 = QtWidgets.QLabel(self.centralwidget)
        self.label_3.setGeometry(QtCore.QRect(70, 136, 101, 20))
        self.label_3.setObjectName("label_3")
        self.n_of_pages = QtWidgets.QLineEdit(self.centralwidget)
        self.n_of_pages.setGeometry(QtCore.QRect(190, 140, 200, 22))
        self.n_of_pages.setObjectName("n_of_pages")
        self.label_4 = QtWidgets.QLabel(self.centralwidget)
        self.label_4.setGeometry(QtCore.QRect(70, 180, 55, 16))
        self.label_4.setObjectName("label_4")
        self.author = QtWidgets.QLineEdit(self.centralwidget)
        self.author.setGeometry(QtCore.QRect(190, 180, 200, 22))
        self.author.setObjectName("author")
        self.label_5 = QtWidgets.QLabel(self.centralwidget)
        self.label_5.setGeometry(QtCore.QRect(240, 10, 211, 21))

        self.label_6 = QtWidgets.QLabel(self.centralwidget)
        self.label_6.setGeometry(QtCore.QRect(20, 650, 500, 21))

        self.label_7 = QtWidgets.QLabel(self.centralwidget)
        self.label_7.setGeometry(QtCore.QRect(20, 700, 500, 21))

        font = QtGui.QFont()
        font.setPointSize(10)
        font.setBold(True)
        font.setWeight(75)

        font2 = QtGui.QFont()
        font2.setPointSize(8)
        font2.setBold(True)
        font2.setWeight(100)

        self.label_5.setFont(font)
        self.label_5.setObjectName("label_5")
        self.label_6.setFont(font2)
        self.label_6.setObjectName("label_6")
        self.label_7.setFont(font2)
        self.label_7.setObjectName("label_7")
        self.btn_add_book = QtWidgets.QPushButton(self.centralwidget)
        self.btn_add_book.setGeometry(QtCore.QRect(210, 240, 93, 28))
        self.btn_add_book.setObjectName("btn_add_book")
        self.btn_change_properties = QtWidgets.QPushButton(self.centralwidget)
        self.btn_change_properties.setGeometry(QtCore.QRect(60, 560, 141, 28))
        self.btn_change_properties.setObjectName("btn_change_properties")
        self.btn_del_book = QtWidgets.QPushButton(self.centralwidget)
        self.btn_del_book.setGeometry(QtCore.QRect(250, 560, 131, 28))
        self.btn_del_book.setObjectName("btn_del_book")
        myworld.setCentralWidget(self.centralwidget)
        self.statusbar = QtWidgets.QStatusBar(myworld)
        self.statusbar.setObjectName("statusbar")
        myworld.setStatusBar(self.statusbar)
        self.btn_add_book.clicked.connect(self.addBook)
        self.btn_change_properties.clicked.connect(self.updateBook)
        self.retranslateUi(myworld)
        QtCore.QMetaObject.connectSlotsByName(myworld)
        self.btn_del_book.clicked.connect(self.deleteBook)
        self.book_table.itemSelectionChanged.connect(self.deleteButtonsHandler)  ##### Silme işlemleri için ID
        self.book_table.resizeColumnsToContents()

    def deleteButtonsHandler(self):
        if len(self.book_table.selectedItems()) != 0:
            print(self.book_table.selectedItems()[0].text())

    def deleteBook(self):

        if len(self.book_table.selectedItems()) != 0:
            deger = (self.book_table.selectedItems()[0].text(),)
            mydb = mysql.connector.connect(
                host="localhost",
                user="root",
                passwd="",
                database="library",
            )
            mydb.set_character_set_name('utf8')
            mycursor = mydb.cursor()
            sql = "DELETE FROM BOOKS WHERE book_id=%s"
            mycursor.execute(sql, deger)
            mydb.commit()
            self.messagebox('Connection', 'Book Removed Successfully')
            self.LoadData()

    def updateBook(self):
        if len(self.book_table.selectedItems()) != 0:
            deger = (self.book_table.selectedItems()[0].text(),)
            db = mdb.connect('localhost', 'root', '', 'library')
            cur = db.cursor()
            bn = self.book_name.text()
            cp = self.n_of_pages.text()
            au = self.author.text()
            isb = self.isbn.text()
            sql = "UPDATE books SET book_name = %s,book_pages = %s,book_author=%s,book_isbn=%s WHERE book_id = %s"
            val = (bn, cp, au, isb, deger)
            cur.execute(sql, val)
            db.commit()
            self.messagebox('Connection', 'Book Info Changed Successfully')
            self.book_name.setText("")
            self.n_of_pages.setText("")
            self.author.setText("")
            self.isbn.setText("")
        self.LoadData()

    def retranslateUi(self, myworld):
        _translate = QtCore.QCoreApplication.translate
        myworld.setWindowTitle(_translate("myworld", "My Library is My World"))
        self.label.setText(_translate("myworld", "ISBN"))
        self.label_2.setText(_translate("myworld", "Book Name"))
        self.label_3.setText(_translate("myworld", "Number of Pages"))
        self.label_4.setText(_translate("myworld", "Author"))
        self.label_5.setText(_translate("myworld", "My Library is My World"))
        self.label_6.setText(_translate("myworld", "Update:Please put on all field if you not your data is can broke."))
        self.label_7.setText(_translate("myworld", "Delete:If you want to delete book you choose your book id."))
        self.btn_add_book.setText(_translate("myworld", "Add Book"))
        self.btn_change_properties.setText(_translate("myworld", "Change Properties"))
        self.btn_del_book.setText(_translate("myworld", "Delete Book"))

        self.book_table.setHorizontalHeaderLabels(['Book Id', 'ISBN', 'Bookname', 'Pages of Count', 'Author'])

        try:
            self.LoadData()
        except:
            self.messagebox('Connection', 'Disconnect Database,Please Check Your Connection')


if __name__ == "__main__":
    import sys

    app = QtWidgets.QApplication(sys.argv)
    myworld = QtWidgets.QMainWindow()
    ui = Ui_myworld()
    ui.setupUi(myworld)
    myworld.show()
    sys.exit(app.exec_())
