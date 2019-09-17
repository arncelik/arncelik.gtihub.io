---
layout: post
title: "Notebook: Introduction to Keras"
date: 2019-01-01
excerpt:
tags: [machine learning, deep learning, keras, tensorflow]
comments: true
---

# What is Keras?
Let's see the definiton of Keras before moving on to explanation of my first task of "Machine Learning Practice" project.
## Definition:

Keras is a high-level neural networks API, written in Python.
It was developed with a focus on enabling fast experimentation. Being able to go from idea to result with the least possible delay is key to doing good research.

Use Keras if you want to quickly build and test a neural network with minimal lines of code. It also;

* Supports both convolutional networks and recurrent networks, as well as combinations of the two.
* Runs seamlessly on CPU and GPU.

The core data structure of Keras is a model, a way to organize layers. The simplest type of model is the Sequential model, a linear stack of layers.

# Machine Learning Practice Task 1: LeNet Implementation with Keras

In this task I have worked on image classification using Keras library and LeNet on the MNIST dataset. I am pretty beginner in Deep Learning, so it was new to me working with Keras and LeNet. I have searched for the resources to see examples before coding right away.Then I encountered this tutorial [LeNet-Convolutional Neural Network in Python](https://www.pyimagesearch.com/2016/08/01/lenet-convolutional-neural-network-in-python/).It is well explained and a brief post that helped me a lot to get the logic of the algorithm.

What was my main task was training the model, and writing a script to test some images from validation dataset.

---
layout: post
title: "From My Notebook: Introduction to Keras"
date: 2019-01-30
excerpt: ""
tags: [machine learning, deep learning, keras, tensorflow]
comments: true
---
# What is Keras?
Let's see what the Keras is before moving on to explanation of my first task of "Machine Learning Practice" project.
## Definition:

Keras is a high-level neural networks API, written in Python.
It was developed with a focus on enabling fast experimentation. Being able to go from idea to result with the least possible delay is key to doing good research.

Use Keras if you want to quickly build and test a neural network with minimal lines of code. It also;

* Supports both convolutional networks and recurrent networks, as well as combinations of the two.
* Runs seamlessly on CPU and GPU.

The core data structure of Keras is a model, a way to organize layers. The simplest type of model is the Sequential model, a linear stack of layers.

# Machine Learning Practice Task 1: LeNet Implementation with Keras

In this task I have worked on image classification using Keras library and LeNet on the MNIST dataset. I am pretty beginner in Deep Learning, so it was new to me working with Keras and LeNet. I have searched for the resources to see examples before coding right away.Then I encountered this tutorial [LeNet-Convolutional Neural Network in Python](https://www.pyimagesearch.com/2016/08/01/lenet-convolutional-neural-network-in-python/).It is well explained and a brief post that helped me a lot to get the logic of the algorithm.

What was my main task was training the model, and writing a script to test some images from validation dataset.
After importing necessary libraries,  I used build method that takes following parameters:
* width
* height
* depth
* number of classes (unique number of clas labels) in the MNIST dataset.


~~~python
# import the necessary packages
from keras.models import Sequential
from keras.layers.convolutional import Conv2D
from keras.layers.convolutional import MaxPooling2D
from keras.layers.core import Activation
from keras.layers.core import Flatten
from keras.layers.core import Dense
from keras import backend as K

class LeNet:
	@staticmethod
	def build(numChannels, imgRows, imgCols, numClasses,
		activation="relu", weightsPath=None):
~~~
After initializing the model, we can start adding layers to it, next move will be compiling and fitting the model.
