
# %%
from pandas import read_csv
from pandas import datetime
from matplotlib import pyplot
from statsmodels.tsa.arima_model import ARIMA
from sklearn.metrics import mean_squared_error
import argparse, pathlib

def parser(x):
	return datetime.strptime(x, '%d-%m-%Y')

parser = argparse.ArgumentParser()
parser.add_argument('file', type=pathlib.Path)
parser.add_argument('a', type=int)
parser.add_argument('b', type=int)
parser.add_argument('c', type=int)
args = parser.parse_args()

with args.file.open('r') as file:
	series = read_csv(file, parse_dates = ['Tanggal'], index_col = ['Tanggal'])

X = series.values
size = int(len(X) * 0.5)
train, test = X[0:size], X[size:len(X)]
history = [x for x in train]
predictions = list()
for t in range(len(test)):
	model = ARIMA(history, order=(args.a, args.b, args.c))
	model_fit = model.fit(disp=0)
	output = model_fit.forecast()
	yhat = output[0]
	predictions.append(yhat)
	obs = test[t]
	history.append(obs)
	# print('predicted=%f, expected=%f' % (yhat, obs))
	print('%f|%f' % (yhat, obs))
# error = mean_squared_error(test, predictions)
# print('Test MSE: %.3f' % error)
# print(predictions)

# plot
# pyplot.plot(test)
# pyplot.plot(predictions, color='red')
# pyplot.savefig('foo.png')
# files.download("foo.png")
# pyplot.show()


# %%



